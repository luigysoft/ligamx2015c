<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct()
	{
        // Call the Controller constructor
        parent::__construct();

        ini_set('display_errors', 1);
				$this->lang->load('messages');
        $this->load->helper('url');
				$this->load->helper('language');
				$this->load->helper('form');
				$this->load->library('session');

			$this->load->model('Partidosmodel', 'MPartidos', TRUE);
	}


	public function index(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');
		
		$imagenes = array("america.jpg", "atlas.jpg", "azul.jpg", "leon.jpg", "queretaro.jpg");
		$no_img = rand(0, count($imagenes)-1);
		$datos['imagen'] = $imagenes[$no_img];
		
		$this->load->view('vw_inicio', $datos);
	}

	public function equipos(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');
		$this->load->view('vw_liga');
	}
	
	public function reglamento(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');
		$this->load->view('vw_reglamento');
	}

	public function calendario(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');
		

		$datos['nodata'] = false;
		$rol_juegos = $this->getJuegosActivos();

		if(count($rol_juegos)>0){
			$jornadas = implode(",", array_keys($rol_juegos));
	    $datos['jornadas'] = $rol_juegos;
			$datos['calendario'] = $this->getPartidos($jornadas);
		  $datos['nodata'] = true;
		}

		$this->load->view('vw_calendario', $datos);
	}
	
	public function pronosticos(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');
		$datos['pronosticos'] = $this->getPronosticos();
		$this->load->view('vw_pronosticos', $datos);
	}
	
	public function tablaGeneral(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');
		$datos['posiciones'] = $this->getTablaGral();
		$this->load->view('vw_tablageneral', $datos);
	}

  public function publicaciones(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');
		$datos['nodata'] = false;
		$datos['visualizarJornadas'] = $this->getNombreJuego();
		$this->load->view('vw_publicador', $datos);
  }

	public function muestraSemana(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');


		$datos = false;

		$jornada = $this->input->post('semana');



		$rolSemana = $this->getPartidos($jornada);
		
		if(count($rolSemana) > 0){
			$i = 1; 
			$datos = "";

			foreach($rolSemana as $registros){
				$datos .= "<tr id='juego_".$i."'>";
				$j=1;
						foreach($registros as $key => $registro){
							switch($j){
								case 1:	
									$idPartido =  $registro; 
									$datos .= "<td align='center'><span id='idpartido_".$i."'>".$idPartido."</span></td>";break;
								case 2:
								case 3:
									$datos .= "<td align='center'>".$registro."</td>";break;
								case 4:
									$datos .= "<td align='center'>&nbsp;</td>";break;
								case 5:
								case 6:
									$datos .= "<td align='center'>".$registro."</td>";break;
								case 7:
									if($registro != null){
										$datos .= "<td align='center'>".$registro."</td>";
									}else{
										$datos .= "<td align='center'><input type='text' id='mlocal_".$i."' name='mlocal_".$i."' onkeypress='ValidaSoloNumeros()' size='2' maxlength='1' /></td>";
									}
									$datos .= "<td align='center'>-</td>";								
									break;

								case 8:
									if($registro != null){
										$datos .= "<td align='center'>".$registro."</td>";
									}else{
										$datos .= "<td align='center'><input type='text' id='mvisit_".$i."' name='mvisit_".$i."' onkeypress='ValidaSoloNumeros()' size='2' maxlength='1' /></td>";
									}
									break;

								case 9:
									$datos .= "<td align='center'>".$registro."</td>";break;
							}
							$j++;
						}

				$datos .= "</tr>";

				$i++;
			}
		}

		$datos .= "<tr id='juego_0'><td align='center' colspan='10' style='display:none;'><div id='regmax' name='regmax'>".$i."</div></td></tr>";
		die($datos);
  }
	
	
	/*
		Capa de negocios - falta :P
	*/
	
	public function getTablaGral(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');

		$datos = $this->MPartidos->getPosiciones();
		return $datos;
	}
	
	public function getPronosticos(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');

		$datos = $this->MPartidos->getPronosticos();
		return $datos;
	}

		public function getPartidos($jornadas){
			if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');

			$this->MPartidos->setJornadas($jornadas);
			$datos = $this->MPartidos->getCalendario();
			return $datos;
		}

	public function getJuegosActivos(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');

		$datos = $this->MPartidos->getJuegosActivos();
		return $datos;
	}

	public function getNombreJuego(){
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');

		$datos = $this->MPartidos->getNombreJuego();
		return $datos;
	}



	
	
}
