<?php
  class Partidosmodel extends CI_Model {
	
		var $_jornadas;
		
		
		function setJornadas($valor){ $this->jornadas = $valor; }
		
		function getJornadas(){ return $this->jornadas; }

	
		function __construct()
    {
    	// Call the Model constructor
        parent::__construct();
    }

    function getJuegosActivos()
    {
      $datos = false;

      $sql="SELECT 
							cnj.id_nombreJuego, cnj.nombre
            FROM c_nombreJuegos cnj
						WHERE 
							cnj.activo = 1
						ORDER BY cnj.id_nombreJuego asc;";

			$datos = array();


      $rs = $this->db->query($sql);

      if($rs->num_rows() > 0)
      {
      	foreach ($rs->result() as $row)
        {
					$datos[$row->id_nombreJuego] = $row->nombre;

        }
		  } 
		  return $datos;  
    }

   
    function getCalendario()
		{
    	$datos = false;

      $sql="SELECT 
							mp.id_partido, mp.fecha, mp.hora, ' ' grupo, 
							cs.sede, 
							cel.equipo local, 
							mp.goles_local, mp.goles_visit, 
							cev.equipo visitante,
							mp.jornada, 
							mp.bandera
            FROM m_partidos mp
						INNER JOIN c_sedes cs ON (cs.id_sede = mp.sede)
						INNER JOIN c_equipos cel ON (cel.id_equipo = mp.local)
						INNER JOIN c_equipos cev ON (cev.id_equipo = mp.visitante)
						WHERE 
							mp.jornada IN (".$this->getJornadas().")
						ORDER BY id_partido asc;";
			$datos = array();
			$registro = array();

      $rs = $this->db->query($sql);

      if($rs->num_rows() > 0)
      {
      	foreach ($rs->result() as $row)
        {
        	$registro['id_partido']	= $row->id_partido;
          $registro['fecha']		= $row->fecha;
          $registro['hora']		= $row->hora;
          $registro['grupo']		= $row->grupo;
          $registro['sede']		= $row->sede;
          $registro['local']		= $row->local;
          $registro['goles_local']		= $row->goles_local;
					$registro['goles_visit']		= $row->goles_visit;
					$registro['visitante']		= $row->visitante;
					$registro['jornada']		= $row->jornada;
					$registro['bandera']		= $row->bandera;
					array_push($datos, $registro);
        }
		} 
		return $datos;  
	}
	
		function getPronosticos()
		{
			$datos = false;

			$sql="SELECT
							par.id_partido partido,
							par.local local,
							pro.goles_local goles_local,
							pro.goles_visit goles_visit,
							par.visitante visitante,
							parti.alias alias
						FROM 	m_pronosticos pro
									INNER JOIN m_partidos par ON (pro.id_partido = par.id_partido)
									INNER JOIN c_participantes parti ON (pro.id_participante = parti.id_participante)
						ORDER BY par.id_partido, parti.alias asc;";
				
			$datos = array();
			$registro = array();

			$rs = $this->db->query($sql);
				
			if($rs->num_rows() > 0)
			{
				foreach ($rs->result() as $row)
				{
					$registro['partido'] 		= $row->partido;
					$registro['local']	 		= $row->local;
					$registro['goles_local']	= $row->goles_local;
					$registro['goles_visit']	= $row->goles_visit;
					$registro['visitante']		= $row->visitante;
					$registro['alias']			= $row->alias;
					array_push($datos, $registro);
				}
			} 
			return $datos;  
		}
	
		function getNombreJuego()
		{
			$datos = false;

      $sql="SELECT 
							cnj.id_nombreJuego id_nombreJuego, cnj.nombre nombre
            FROM c_nombreJuegos cnj
						WHERE 
							cnj.activo = 1
						ORDER BY cnj.id_nombreJuego asc;";
      
			$datos = array();


      $rs = $this->db->query($sql);

      if($rs->num_rows() > 0)
      {
      	foreach ($rs->result() as $row)
        {
					$datos[$row->id_nombreJuego] = $row->nombre;

        }
		  } 
		  return $datos;  
		}
		
		
		function getPosiciones()
		{
			$datos = false;

			$sql="SELECT 
							orig.puntos,
							orig.aciertos,
							parti.alias,
							orig.id_participante
						FROM
						(SELECT 
							pro.id_participante, SUM(IFNULL(pro.aciertos,'0')) as aciertos, SUM(IFNULL(pro.puntos,'0')) as puntos 
						FROM m_pronosticos pro 
						GROUP BY pro.id_participante
						ORDER BY puntos DESC, aciertos DESC) orig
						INNER JOIN c_participantes parti ON (orig.id_participante = parti.id_participante);";
			$datos = array();
			$registro = array();

			$rs = $this->db->query($sql);
				
			if($rs->num_rows() > 0)
			{
				$n = 1;
				foreach ($rs->result() as $row)
				{
					$registro['id_posicion']			= $n;
					$registro['alias']						= $row->alias;
					$registro['aciertos']					= $row->aciertos;
					$registro['puntos']						= $row->puntos;
					array_push($datos, $registro);
					$n++;
				}
			} 
			return $datos;  
		}
	
	

		function getOctavos()
		{
			$datos = false;

			$sql="SELECT 
							id_partido, fecha, hora,  sede, local, goles_local, goles_visit, visitante
						FROM m_partidos WHERE id_partido BETWEEN 49 AND 56 ORDER BY id_partido asc;";
			$datos = array();
			$registro = array();

			$rs = $this->db->query($sql);

			if($rs->num_rows() > 0)
			{
				foreach ($rs->result() as $row)
				{
					$registro['id_partido']	= $row->id_partido;
					$registro['fecha']		= $row->fecha;
					$registro['hora']		= $row->hora;
					$registro['sede']		= $row->sede;
					$registro['local']		= $row->local;
					$registro['goles_local']		= $row->goles_local;
					$registro['goles_visit']		= $row->goles_visit;
					$registro['visitante']		= $row->visitante;
					array_push($datos, $registro);
				}
			} 
			return $datos;  
		}
		
		function getCuartos()
		{
			$datos = false;

			$sql="SELECT 
							id_partido, fecha, hora,  sede, local, goles_local, goles_visit, visitante
						FROM m_partidos WHERE id_partido BETWEEN 57 AND 60 ORDER BY id_partido asc;";
			$datos = array();
			$registro = array();

			$rs = $this->db->query($sql);

			if($rs->num_rows() > 0)
			{
				foreach ($rs->result() as $row)
				{
					$registro['id_partido']	= $row->id_partido;
					$registro['fecha']		= $row->fecha;
					$registro['hora']		= $row->hora;
					$registro['sede']		= $row->sede;
					$registro['local']		= $row->local;
					$registro['goles_local']		= $row->goles_local;
					$registro['goles_visit']		= $row->goles_visit;
					$registro['visitante']		= $row->visitante;
					array_push($datos, $registro);
				}
			} 
			return $datos;  
		}

		function getSemi()
		{
			$datos = false;

			$sql="SELECT 
							id_partido, fecha, hora,  sede, local, goles_local, goles_visit, visitante
						FROM m_partidos WHERE id_partido BETWEEN 61 AND 62 ORDER BY id_partido asc;";
			$datos = array();
			$registro = array();

			$rs = $this->db->query($sql);

			if($rs->num_rows() > 0)
			{
				foreach ($rs->result() as $row)
				{
					$registro['id_partido']	= $row->id_partido;
					$registro['fecha']		= $row->fecha;
					$registro['hora']		= $row->hora;
					$registro['sede']		= $row->sede;
					$registro['local']		= $row->local;
					$registro['goles_local']		= $row->goles_local;
					$registro['goles_visit']		= $row->goles_visit;
					$registro['visitante']		= $row->visitante;
					array_push($datos, $registro);
				}
			} 
			return $datos;  
		}

		function getTercero()
		{
			$datos = false;

			$sql="SELECT 
							id_partido, fecha, hora,  sede, local, goles_local, goles_visit, visitante
						FROM m_partidos WHERE id_partido =63 ORDER BY id_partido asc;";
			$datos = array();
			$registro = array();

			$rs = $this->db->query($sql);

			if($rs->num_rows() > 0)
			{
				foreach ($rs->result() as $row)
				{
					$registro['id_partido']	= $row->id_partido;
					$registro['fecha']		= $row->fecha;
					$registro['hora']		= $row->hora;
					$registro['sede']		= $row->sede;
					$registro['local']		= $row->local;
					$registro['goles_local']		= $row->goles_local;
					$registro['goles_visit']		= $row->goles_visit;
					$registro['visitante']		= $row->visitante;
					array_push($datos, $registro);
				}
			} 
			return $datos;  
		}

		function getFinal()
		{
			$datos = false;

			$sql="SELECT 
							id_partido, fecha, hora,  sede, local, goles_local, goles_visit, visitante
						FROM m_partidos WHERE id_partido = 64 ORDER BY id_partido asc;";
			$datos = array();
			$registro = array();

			$rs = $this->db->query($sql);

			if($rs->num_rows() > 0)
			{
				foreach ($rs->result() as $row)
				{
					$registro['id_partido']	= $row->id_partido;
					$registro['fecha']		= $row->fecha;
					$registro['hora']		= $row->hora;
					$registro['sede']		= $row->sede;
					$registro['local']		= $row->local;
					$registro['goles_local']		= $row->goles_local;
					$registro['goles_visit']		= $row->goles_visit;
					$registro['visitante']		= $row->visitante;
					array_push($datos, $registro);
				}
			} 
			return $datos;  
		}

	
	
}
?>
