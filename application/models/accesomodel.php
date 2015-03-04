<?php
  class Accesomodel extends CI_Model {

		var $user   				= '';
		var $pass   				= '';
		var $pass_enc   		= '';
		var $idUsuario 			= '';
		var $idTipoUsuario 	= '';
		var $idAcceso 			= '';
		var $tiempoSession 	= "900";
		var $tablaNombre		= 	"c_participantes";
/*
			ALTER TABLE participantes ADD password VARCHAR(100) AFTER correo;
			ALTER TABLE participantes ADD UNIQUE (correo);
		*/
		
    function __construct(){
			// Call the Model constructor
				parent::__construct();
		}

		function setUser($user){ $this->user = $user;  }
		function setPass($pass){ $this->pass = $pass;  }
		function setPass_enc($pass_enc){ $this->pass_enc = $pass_enc;  }
		function setIdUsuario($idUsuario){ $this->idUsuario = $idUsuario;  }
		function setIdAcceso($idAcceso){ $this->idAcceso = $idAcceso;  }
		function setIdTipoUsuario($idTipoUsuario){ $this->idTipoUsuario = $idTipoUsuario;  }
		function setTablaNombre($tablaNombre){ $this->tablaNombre = $tablaNombre;  }

		function getUser(){ return $this->user;  }
		function getPass(){ return $this->pass;  }
		function getPass_enc(){ return $this->pass_enc;  }
		function getIdUsuario(){ return $this->idUsuario;  }
		function getIdAcceso(){ return $this->idAcceso;  }
		function getIdTipoUsuario(){ return $this->idTipoUsuario;  }
		function getTablaNombre(){ return $this->tablaNombre;  }
		function getTiempoSession(){ return $this->tiempoSession;  }
        
        
		function getUsuarioValidate()
		{
			$datos = false;

			$sql="SELECT 
								id_participante,
								nombre,
								alias,
								correo
						FROM ".$this->getTablaNombre()."
						WHERE correo = '".$this->getUser()."'
									AND password = '".$this->getPass()."'
									AND activo = ".ACTIVO.";";

			$rs = $this->db->query($sql);
	
			if($rs->num_rows() > 0){
				foreach ($rs->result() as $row)
				{
					$datos['id_participante']	= $row->id_participante;
					$datos['alias']					= $row->alias;
					$datos['nombre']		= $row->nombre;
					$datos['correo']		= $row->correo;
				}
			}
			return $datos;
		}
		
		function getUsuarios()
		{
			$registro = false;

      $sql="SELECT 
						id_usuario,
						usuario, 
						CASE WHEN (idTipoUsuario = 1) THEN 'Administrador' ELSE 'Usuario' END tipousuario, 
						panel 
				FROM c_usuarios 
				WHERE estatus = ".ACTIVO.";";
      $rs = $this->db->query($sql);
			
			$datos = array();
			$registro = array();
			
			if($rs->num_rows() > 0)
			{
				foreach ($rs->result() as $rows)
				{
					$registro['id_usuario'] = $rows->id_usuario;
					$registro['usuario'] = $rows->usuario;
					$registro['idTipoUsuario'] = $rows->tipousuario;
					$registro['panel'] = $this->getNombrePanel($rows->panel);
					array_push($datos, $registro);
        }
      }
      return $datos;
		}

  }
?>
