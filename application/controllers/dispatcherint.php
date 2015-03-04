<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dispatcherint extends CI_Controller {

	function __construct()
	{
        // Call the Controller constructor
        parent::__construct();

        ini_set('display_errors', 1);
        $this->load->helper('url');
				$this->load->model('Dispatchermodel', 'MDispatcher', TRUE);


	}

	public function index()
	{
		$this->failFast();

	}
  
  public function failFast()
	{	
		exit("Sorry my friend, access denied!");
	}

	/*ex.- http://localhost/quinielabrasil2014/index.php/dispatcher/marcadorFinal/1_1_2 */
	public function marcadorFinal($marcador = false)
	{
		if(empty($marcador)) $this->failFast();	

		list($partido, $local, $visit) = explode("_", $marcador);
		$bandera = $this->bandera($local, $visit);

		//Actualiza el marcador final del partido (id_partido) finalizado
		$this->MDispatcher->marcadorFinal($partido, $local, $visit, $bandera);

		//Pone el acierto y los puntos a los pronosticos del partido finalizado
		$this->actualizaPuntuacion($partido, $local, $visit, $bandera);
		

	}
	
	/*ex.-  http://localhost/quinielabrasil2014/index.php/dispatcher/pronosticos/2_2_2_paquito */
	public function pronosticos($marcador = false)
	{
		if(empty($marcador)) $this->failFast();

		list($partido, $local, $visit, $alias) = explode("_", $marcador);
		$bandera = $this->bandera($local, $visit);


		$datos = $this->MDispatcher->pronosticos($partido, $local, $visit, $alias, $bandera);
		return $datos;
	}

	public function guardaSemana($marcador = false)
	{
		if(empty($marcador)) $this->failFast();
		if($this->session->userdata('logged_in') !== TRUE)  redirect('/acceso/', 'refresh');

		list($partido, $local, $visit, $alias) = explode("_", $marcador);
		$bandera = $this->bandera($local, $visit);
		$datos = $this->MDispatcher->pronosticos($partido, $local, $visit, $alias, $bandera);
		return $datos;
	}

	public function bandera($local, $visit)
	{
		$bandera = false;
		if($local > $visit)  $bandera = "100";
		else if($local == $visit) $bandera = "010";
		else if($local < $visit)  $bandera = "001";
		else $bandera = false;
		
		return $bandera;
	}

	public function actualizaPuntuacion($partido, $local, $visit, $bandera)
	{
		$aciertos = 0;
		$puntos = 0;
		//Pone el acierto y los puntos a los pronosticos del partido finalizado
		$pronosticoPartido = $this->MDispatcher->getPronosticosPartido($partido);


		foreach($pronosticoPartido as $registros)
		{
			if($registros['bandera'] == $bandera)
			{
				if($registros['goles_local'] == $local && $registros['goles_visit'] == $visit)
				{
					$aciertos = 1;
					$puntos = 3;
				}else
				{	
					$aciertos = 0;
					$puntos = 1;	
				}
				$this->MDispatcher->actualizaPuntuacion($partido, $registros['id_participante'], $aciertos, $puntos);
			}

		}
	}

	
}


