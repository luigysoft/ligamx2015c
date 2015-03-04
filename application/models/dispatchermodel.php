<?php
  class Dispatchermodel extends CI_Model {

	
	function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }

	function marcadorFinal($partido, $local, $visit, $bandera)
	{
			$datos = false;

			$sql="UPDATE partidos set 
							goles_local='".$local."',
							goles_visit='".$visit."',
							bandera='".$bandera."'
						WHERE id_partido=".$partido;
			$rs = $this->db->query($sql);
			return $rs;
	}
	
	function pronosticos($partido, $local, $visit, $alias, $bandera)
	{
		$datos = false;
		$id_participante = false;
		
		$sql="SELECT id_participante
			FROM participantes
			WHERE alias ='".$alias."';";
			
		$rs = $this->db->query($sql);
	
		if($rs->num_rows() > 0)
		{
			foreach ($rs->result() as $row)
			{
				$id_participante	= $row->id_participante;
				break;
			}

			$sql="INSERT INTO pronosticos VALUES (".$partido.", ".$id_participante.", '".$local."', '".$visit."', null, null, '".$bandera."', 1);";
			$rs = $this->db->query($sql);
			return $rs;
		}
	}

	function getPronosticosPartido($partido)
	{
		$datos = false;

   	$sql="SELECT 
						id_participante, id_partido, goles_local, goles_visit, bandera
          FROM pronosticos
					WHERE id_partido =".$partido;

		$datos = array();
		$registro = array();

    $rs = $this->db->query($sql);
			
    if($rs->num_rows() > 0)
    {
	   	foreach ($rs->result() as $row)
			{
	     	$registro['id_participante']	= $row->id_participante;
				$registro['id_partido']				= $row->id_partido;
        $registro['goles_local']			= $row->goles_local;
        $registro['goles_visit']			= $row->goles_visit;
        $registro['bandera']					= $row->bandera;
				array_push($datos, $registro);
			}
		} 
		return $datos;  
	}
	
	function actualizaPuntuacion($partido, $participante, $aciertos, $puntos)
	{
			$datos = false;

			$sql="UPDATE pronosticos set 
							aciertos=".$aciertos.",
							puntos=".$puntos."
						WHERE id_partido=".$partido."
									AND id_participante=".$participante.";";

			$rs = $this->db->query($sql);
			return $rs;
	}
		
}
?>
