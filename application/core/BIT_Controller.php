<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BIT_Controller extends CI_Controller {

	public function BIT_Controller(){
		parent::__construct();
	}

	public function registrarBitacora($id_usuario, $id_accion)
	{
		
		/*
		$this->load->model('Bitacoramodel', 'MBitacora', TRUE);
		$this->MBitacora->setId_usuario($id_usuario);
		$this->MBitacora->setId_accion($id_accion);
		
		$datos = $this->MBitacora->registraAccion();
		return $datos;
		*/
	}

	public function getMenu($id_usuario)
	{
		$this->load->model('Usuariosmodel', 'MUsuario', TRUE);	
		$this->MUsuario->setId_campo($this->session->userdata('id_usuario'));
		$opciones = $this->MUsuario->getRelacionModulos();


		$menu = '<ul id="nav">
					<li class="top1"><a href="'.base_url().'index.php/inicio/" class="top_link"><span>Inicio</span></a></li>';
					
		if(in_array(M_DIRECTORIO, $opciones)){
			$menu.=	'<li class="top1"><a href="'.base_url().'index.php/cdirectorio/" class="top_link"><span>Directorio</span></a></li>';
		}
		if(in_array(M_ADMINISTRACION, $opciones)){
			$menu.=	'<li class="top1">
										<a href="#nogo10" id="products" class="top_link"><span class="down">Administración</span></a>
		               	<ul class="sub2">
			               	<li>
												<a href="#nogo11" class="fly2">Catálogos genéricos</a>
					            <ul>
								   <li><a href="'.base_url().'index.php/ccargos/">Cargos</a></li>
								   <li><a href="'.base_url().'index.php/ccategorias/">Categorías</a></li>
						           <li><a href="'.base_url().'index.php/cdependencias/">Dependencias</a></li>
								   <li><a href="'.base_url().'index.php/cestatusllamadas/">Estatus de llamadas</a></li>
								   <li><a href="'.base_url().'index.php/cprioridadesaudiencias/">Prioridades audiencias</a></li>
								   <li><a href="'.base_url().'index.php/ctipollamadas/">Tipo de llamadas</a></li>
								   <li><a href="'.base_url().'index.php/ctipotelefonos/">Tipo de teléfonos</a></li>
					            </ul>
			                </li>
							<li>
								<a href="#nogo11" class="fly2">Catálogos especiales</a>
								<ul>
						           <li><a href="'.base_url().'index.php/ctitulos/">Títulos</a></li>
								   <li><a href="'.base_url().'index.php/cusuarios/">Usuarios</a></li>
								</ul>
							</li>
						</ul>
			        </li>';
		}
		if(in_array(M_LLAMADAS, $opciones)){
			$menu.= '<li class="top1"><a href="'.base_url().'index.php/cllamadas/" class="top_link"><span>Llamadas</span></a></li>';
					
		}
		if(in_array(M_REPORTES, $opciones)){
			$menu.=	'<li class="top1"><a href="'.base_url().'index.php/creportes/" class="top_link"><span>Reportes</span></a></li>';
		}
	    	$menu.='<li class="top1"><a href="'.base_url().'index.php/salir/" class="top_link"><span>Cerrar Sesión</span></a></li>
			 	</ul>';
				
		return $menu;
	}
	
	function validate_parameters($arr_parameters)
	{
		$arr_return = array();
		
		foreach($arr_parameters as $valor)
		{
			$elem = $this->fn_reservedwords($valor);
			array_push($arr_return, $elem);
		}
		
		return $arr_return;
	}
	
	function fn_reservedwords($mystring2)
	{
		////DML , DDL , DCL , TC, EXTRA
		$reserved_words = array(
							"SELECT", "INSERT", "UPDATE", "DELETE", 
							"CREATE", "ALTER", "DROP", "TRUNCATE", "DATABASE",  
							"GRANT", "REVOKE", 
							"COMMIT", "ROLLBACK", "SAVEPOINT",
							"FROM", "SET", "WHERE", "SHOW", "TABLES", "TABLE", "||", "&&");

		$aux = false;		
		
		foreach($reserved_words as $findme){
			
			$pos2 = stripos($mystring2, $findme);
			if ($pos2 !== false) { 
				
				$mystring2 = str_replace($findme, "", $mystring2); 
			}
		}
		
		return $mystring2;
	}

}

?>
