<?php 

	class Bitacoramodel extends CI_Model {

		var $id_usuario = "";
		var $id_accion = "";
		var $tablaNombre = "m_bitacora";
		
		function setId_usuario($id_usuario){ $this->id_usuario = $id_usuario; }
		function setId_accion($id_accion){ $this->id_accion = $id_accion; }
	
		function setTablaNombre($tablaNombre){ $this->tablaNombre = $tablaNombre;  }
        function getTablaNombre(){ return $this->tablaNombre;  }
        
        function getId_usuario(){ return $this->id_usuario;  }
        function getId_accion(){ return $this->id_accion;  }
        
		
		function registraAccion()
		{
			$sql = "INSERT INTO m_bitacora VALUES ('', ".$this->getId_usuario().", ".$this->getId_accion().", sysdate(), 1)";
			
			$rs = $this->db->query($sql);
			return $rs;
		}
	}
	
?>