<?php
class Email_model extends CI_Model {
	
	 
	
	private $enderecoServidor;
	
	public function __construct() {
		parent::__construct();
		$this->enderecoServidor = 'http://localhost/fivecart3/';
		//$this->enderecoServidor = 'http://www.meusencartes.com.br/fivecart3/';
		
	}
	
	public function enviar($email) {
		

		if(!extension_loaded('openssl'))
		{
			throw new Exception('This app needs the Open SSL PHP extension.');
		}
		
		
		/*
		 * $tipo_mensagem: � o tipo da mensagem que est� sendo enviada. Ser� mostrada no assunto. Sinaliza��o de problema, anota��o
		 */
		date_default_timezone_set ( "America/Sao_Paulo" );
		
		
		$email = trim ( $email );
		
		$dados_usuario = $this->core_model->getById('users',array('email' => $email));
		

		$date = date ( 'm/Y' );
		$codigo_senha = md5 ( $dados_usuario->id . $email );

		$data = array(
 
			'forgotten_password_selector' => $codigo_senha,
		 
		 );
	
		$data = html_escape($data);
	
		$this->core_model->update('users', $data, array('email' => $email));
		
		
		/*
		 * $inicio = "<br> <b>Altera��o de senha<br><br> Informamos <a href='http://localhost/mysale/index.php/usuarios/alterar_senha/{$dados_usuario['id']}/{$codigo_senha}'>bysale.com.br/alterarSenha</a>. <br> <br>
		 */
		
		$endereco = $this->enderecoServidor."account/forgotPasswordChange/".$dados_usuario->id."/".$codigo_senha;
		//echo $endereco ; die();
		// $endereco = "http://localhost/mysale/index.php/usuarios/alterar_senha";
		$inicio = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<title>Superbizu</title>
</head>

<body>
    <p><img src='http://www.superbizu.com.br/imagens/superbizu_email.png' id='logo' alt='Superbizu' width='70' height='61' /></p>



    <p class='text'><strong>Ol&aacute; </strong></p>
    <p class='text'>Voc&ecirc; fez uma solicita&ccedil;&atilde;o para recuperar o acesso ao aplicativo Meus Encartes. </p>
    <p class='text'>Clique no <a href=" . $endereco .">link</a> para alterar sua senha.    </p>
    <p class='text'>Atenciosamente, </p>
    <p align='center' class='text'><strong>Equipe Meus encartes</strong></p>
    <p align='center' class='text'><strong>Encartes para seu comércio em alguns segundos!</strong></p>
<hr />
    <p class='text'>&nbsp;</p>

</body>
</html>";
		
		$meio = "";
		
		$rodape = "";
		
		$mensagem_completa = $inicio . $meio . $rodape;
		$this->load->library ( 'email' );
		
		$this->email->from ( 'info@meusencartes.com.br', 'Meus Encartes - Esqueci minha senha ' );
		$this->email->to ($email);
		//$this->email->cc ( 'rezenderegis@gmail.com' );
		
		/*
		 * $this->email->from('comercial@bysale.com.br','Bysale'); $this->email->to($email); $this->email->cc('comercial@bysale.com.br');
		 */
		
		$this->email->subject ( 'Meus Encartes - Esqueci minha senha' );
		$this->email->message ( $mensagem_completa );
		
		if ($this->email->send ()) {
			
			 $this->session->set_flashdata("success", "Solicitação feita com sucesso!");
			// echo 'E-mail para '.$acoes['email'].' enviado com sucesso!';
		} else {
			show_error ( $this->email->print_debugger () );
			return $this->email->print_debugger ();
			
		}
	}
	
	
	
	
	public function enviar_email_criacao_conta($email, $tipoCadastroConta, $nomeLista="") {
		
		/*
		 * $tipo_mensagem: � o tipo da mensagem que est� sendo enviada. Ser� mostrada no assunto. Sinaliza��o de problema, anota��o
		 */
		date_default_timezone_set ( "America/Sao_Paulo" );
		$dadosUsuarioLogado = "";
		if (strcmp($tipoCadastroConta, "ALUNO_FEZ_PROPRIO_CADASTRO_APLICATIVO") != 0) {
			$dadosUsuarioLogado = $this->session->userdata ( "usuario_logado" );
			$dadosUsuarioLogado = $dadosUsuarioLogado['nome'];
		}
		
		// print_r($acoes_sem_progresso);
		$this->load->model ( "usuarios_model" );
		$email = trim ( $email );
		
		$dados_usuario = $this->usuarios_model->buscaPorEmail ( $email, '' );
	
		$date = date ( 'm/Y' );
		
		/*
		 * $inicio = "<br> <b>Altera��o de senha<br><br> Informamos <a href='http://localhost/mysale/index.php/usuarios/alterar_senha/{$dados_usuario['id']}/{$codigo_senha}'>bysale.com.br/alterarSenha</a>. <br> <br>
		 */
		
		$inicio = $this->trazerTextoEmail ( $tipoCadastroConta, $dadosUsuarioLogado, $dados_usuario ['nome'], $nomeLista );
		
		$meio = "";
		
		$rodape = "";
		
		$mensagem_completa = $inicio . $meio . $rodape;
		
		$this->load->library ( 'email' );
		
		$this->email->from ( 'superbizu.estudos@gmail.com', 'SuperBizu - Sua ferramenta de estudos ' );
		$this->email->to ( $email );
		$this->email->cc ( 'rezenderegis@gmail.com' );
		
		/*
		 * $this->email->from('comercial@bysale.com.br','Bysale'); $this->email->to($email); $this->email->cc('comercial@bysale.com.br');
		 */
		
		$this->email->subject ( 'SuperBizu, sua ferramenta de estudos!' );
		$this->email->message ( $mensagem_completa );
		
	
		
		if (@$this->email->send ()) {
				
			// $this->session->set_flashdata("success", "Solicita��o feita com sucesso!");
			// echo 'E-mail para '.$acoes['email'].' enviado com sucesso!';
		} else {
				//			show_error ( $this->email->print_debugger () );
		
			$this->session->set_flashdata("success", "Houve um erro ao enviar o email aos alunos!");
		}
		
		
	}
	
	



	
	
	
	
	
}