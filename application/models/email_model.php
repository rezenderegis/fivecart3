<?php
class Email_model extends CI_Model {
	
	 
	
	private $enderecoServidor;
	
	public function __construct() {
		parent::__construct();
		$this->enderecoServidor = 'http://localhost:8888/fivecart3/';
		//$this->enderecoServidor = 'http://www.meusencartes.com.br/fivecart3/';
		
	}
	
	public function enviar($email) {
		
		if(!extension_loaded('openssl'))
		{
			throw new Exception('This app needs the Open SSL PHP extension.');
		}
		
		date_default_timezone_set ( "America/Sao_Paulo" );
		
		
		$email = trim ( $email );
		
		
		$dados_usuario = $this->core_model->getById('users',array('email' => $email));
		
		$code = $this->ion_auth->forgotten_password($email);
		
		$endereco = $this->enderecoServidor."account/forgotPasswordChange/".$code['forgotten_password_code'];
		// $endereco = "http://localhost/mysale/index.php/usuarios/alterar_senha";
		$inicio = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<title>Superbizu</title>
</head>

<body>
    <!-- <p><img src='http://www.superbizu.com.br/imagens/superbizu_email.png' id='logo' alt='Superbizu' width='70' height='61' /></p> -->

    <p class='text'><strong>Ol&aacute; </strong></p>
    <p class='text'>Voc&ecirc; fez uma solicita&ccedil;&atilde;o para recuperar o acesso ao aplicativo Meus Encartes. </p>
    <p class='text'>Clique no <a href=" . $endereco .">link</a> para alterar sua senha.    </p>
    <p class='text'>Atenciosamente, </p>
    <p align='center' class='text'><strong>Equipe Meus Encartes</strong></p>
    <p align='center' class='text'><strong>Encartes para seu com&eacute;rcio em alguns segundos!</strong></p>
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
		
		$this->email->subject ( 'Meus Encartes - Esqueci minha senha' );
		$this->email->message ( $mensagem_completa );
		
		if ($this->email->send ()) {
			
			 $this->session->set_flashdata("success", "Solicitação feita com sucesso!");

			} else {
			show_error ( $this->email->print_debugger () );
			return $this->email->print_debugger ();
			
		}
	}


	public function sendCreationAccount($id=0) {
		
		if(!extension_loaded('openssl'))
		{
			throw new Exception('This app needs the Open SSL PHP extension.');
		}
		
		date_default_timezone_set ( "America/Sao_Paulo" );
				
		$dados_usuario = $this->core_model->getById('users',array('id' => $id));
	
		$endereco = $this->enderecoServidor."account/confirmAccount/".$dados_usuario->activation_selector;
	
		
		
		// $endereco = "http://localhost/mysale/index.php/usuarios/alterar_senha";
		$inicio = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<title>Superbizu</title>
</head>

<body>
    <!-- <p><img src='http://www.superbizu.com.br/imagens/superbizu_email.png' id='logo' alt='Superbizu' width='70' height='61' /></p> -->

    <p class='text'><strong>Ol&aacute; </strong></p>
    <p class='text'>Bem vindo aos Meus Encartes. </p>
    <p class='text'>Acesse seu e-mail e clique no <a href=" . $endereco .">link</a> para ativar sua conta.    </p>
    <p class='text'>Atenciosamente, </p>
    <p align='center' class='text'><strong>Equipe Meus Encartes</strong></p>
    <p align='center' class='text'><strong>Encartes para seu com&eacute;rcio em alguns segundos!</strong></p>
<hr />
    <p class='text'>&nbsp;</p>

</body>
</html>";
	
		$meio = "";
		
		$rodape = "";
		
		$mensagem_completa = $inicio . $meio . $rodape;
		$this->load->library ( 'email' );
		
		$this->email->from ( 'info@meusencartes.com.br', 'Meus Encartes - Esqueci minha senha ' );
		$this->email->to ($dados_usuario->email);
		
		$this->email->subject ( 'Meus Encartes - Esqueci minha senha' );
		$this->email->message ( $mensagem_completa );
		
		if ($this->email->send ()) {
			
			 $this->session->set_flashdata("success", "Solicitação feita com sucesso!");

			} else {
			show_error ( $this->email->print_debugger () );
			return $this->email->print_debugger ();
			
		} 
	}

	
	
}