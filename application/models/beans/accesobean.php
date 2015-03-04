<?php
  class Accesobean extends CI_Model {

		var $user   				= '';
		var $pass   				= '';
		var $pass_enc   		= '';
		var $idUsuario 			= '';
		var $idTipoUsuario 	= '';
		var $idAcceso 			= '';
		var $tiempoSession 	= "900";

		
    function __construct(){
			// Call the Model constructor
				parent::__construct();
		}

    /* Método para llenar la capa de negocio (beans) y mandarlo a la capa de datos (models) */
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

	
