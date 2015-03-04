<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acceso extends BIT_Controller {

	/**
	 * Descripci�n: 	Muestra la pantalla de acceso (login)
	 * autor: 			I.S.C Francisco Enrique Valdez Romo
	 * correo: 			varfe13@gmail.com
	 * Fecha de creaci�n: 		M�xico D.F. a 03 de Julio del 2014
	 * Fecha de modificaci�n: 	M�xico D.F. a 03 de Julio del 2014
	 */

	/* M�todo constructor */
	function __construct()
	{
		// Call the Controller constructor
		parent::__construct();
		
		$this->load->helper('language');
		$this->load->helper('url');
		$this->lang->load('messages');
		$this->load->helper('form');
		$this->load->library('session');
  }

	/* M�todo index */
	public function index()
	{
		$this->session->destroy();
		$message['error'] = '';
		$this->formAcceso($message);
	}
	
	public function error($mesaje)
	{
		$this->session->destroy();
		$message['error'] = $mesaje;
		$this->formAcceso($message);
	}
	
	/* M�todo de la pantalla de acceso */
	public function formAcceso($message)
	{
		$this->load->view('vw_acceso', $message);		
	}

	/* M�todo de autenticaci�n */
	public function autenticar()
	{
	  $usuario_in 	=  addslashes(trim($this->input->post('usuario')));
	  $contrasenia_in 	=  addslashes(trim($this->input->post('contrasenia')));
		
		$valores = array($usuario_in, $contrasenia_in);
		list($usuario, $contrasenia) = $this->validate_parameters($valores);
	  
	  if($usuario != "" &&  $contrasenia != "")
	  { 
	  	$exists = $this->getUsuario($usuario, md5($contrasenia));

	  	if($exists == false)
	  	{
			//$mensaje = $this->lang->line('vw_acceso.mns_errorInvalidate');
			header("Location: ".base_url()."index.php/acceso/error/2");
			exit;
	  	}else
	  	{
			$newSession = array(
				'id_participante' => $exists['id_participante'],
				'alias' 	=> $exists['alias'],
				'correo' => $exists['correo'],
				'logged_in'	=> TRUE
			);
			
			$this->session->set_userdata($newSession);
			$this->registrarBitacora($this->session->userdata('id_participante'), INGRESAR_AL_SISTEMA);
			//echo true;
			header("Location: ".base_url()."index.php/inicio");
			exit;
	  	}
	  }else
	  {
	  	//$mensaje = $this->lang->line('vw_acceso.mns_errorVacio');
		header("Location: ".base_url()."index.php/acceso/error/1");
		exit;
	  }
	}
	
	/* M�todo para llenar la capa de negocio (beans) y mandarlo a la capa de datos (models) */
	public function getUsuario($usuario, $contrasenia)
	{
			$this->load->model('Accesomodel', 'MAcceso', TRUE);
         	$this->MAcceso->setUser($usuario);
         	$this->MAcceso->setPass($contrasenia);
         	$datos = $this->MAcceso->getUsuarioValidate();
         
         	return $datos;
	}
}

?>
