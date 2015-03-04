<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salir extends BIT_Controller {

	function __construct()
    {
        // Call the Controller constructor
        parent::__construct();

        ini_set('display_errors', 1);
        $this->load->helper('language');
        $this->load->helper('url');
        $this->lang->load('messages');
        $this->load->helper('form');
        $this->load->library('session');
    }
    
  public function index(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');
		//$this->registrarBitacora($this->session->userdata('id_usuario'), SALIR_DEL_SISTEMA);
		$this->salir();
	}
	
	public function salir(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');
		$logout=$this->session->destroy();
		redirect('/acceso/', 'refresh');
	}
	
	
}

?>