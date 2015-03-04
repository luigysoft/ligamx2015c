<script type="text/javascript">
$(document).ready(function(){

		var muestraSemana = "inicio/muestraSemana";
		var url = $('#pathURL').val()+"index.php/" + muestraSemana;

		

		$("#pub_pro").change(function(){
					if($("#pub_pro").val() != 0)
					{
			
							$.post(url,{ semana:$("#pub_pro").val() },
							function(data){ 
									$("#tbl_marcadores").hide();
									limpiaTabla();
					
									$("#tbl_marcadores").append(data);
									$("#tbl_marcadores").show();
									$("#tbl_rol").show();

									n = data.search("input");
									if(n != -1)	$("#tb_guardar").show();
									else	$("#tb_guardar").hide();
					
							});
					}else{
						$("#tbl_marcadores").hide();
						limpiaTabla();
						$("#tb_guardar").hide();
					}
		});

		
});

function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}

function limpiaTabla(){
	var i = 0;
	var flag = false;
	while(flag==false){
		if ($('#juego_'+i).length) {
			$('#juego_'+i).remove(); 
		}else{
			flag=true;
		}
		i++;
	}
}


function guardarPronostico()
{
	var cadena = "";
	var str = false;	
	var flag = false;

	for(var i=1; i<$("#regmax").html(); i++)
  {
		if($("#mlocal_"+i).val() != "" && $("#mvisit_"+i).val() != "")
		{
			flag = true;
			cadena += $("#idpartido_"+i).html()+"_"+$("#mlocal_"+i).val()+"_"+$("#mvisit_"+i).val()+"|||";

		}else{
			flag = false;
			alert("Favor de ingresar todos los marcadores");break;
		}
  }

	if(flag == true)
	{
		str = cadena.substring(0, cadena.length-3);


		var guardaSemana = "dispatcher/guardaSemana/1";
		var url = $('#pathURL').val()+"index.php/" + guardaSemana;
	
		$.post(url,{ 
			semana:$("#pub_pro").val(),
			pronosticos:str
		},
		function(data){ 
			
					
		});
	
	}
}


</script>

	<h2><?=lang('vw_publicador.ttl_pronosticos')?></h2>

	<br />
	<table>
		<tr>
			<td><?=lang('vw_publicador.ttl_seleccionaSemana')?></td>
			<td>
				<select id="pub_pro" name="pub_pro">
					<option value="0"><?=lang('vw_gral.lbl_seleccione')?></option>
					<?php
					foreach($visualizarJornadas as $key => $option):
					?>
					<option value="<?=$key?>"><?=$option?></option>
					<?php
					endforeach;
					?>
				</select>
			</td>

		</tr>
	</table>
	<br />
	<div id="tbl_rol" style="display:none;">
		<table id="tbl_marcadores" class="hoverTable" border="0" style="display:none;">
			<tr>
				<th style="width: 30px; " align="center"><?=lang('vw_calendario.lbl_partido')?></th>
				<th style="width: 120px; " align="center"><?=lang('vw_calendario.lbl_fecha')?></th>
				<th style="width: 80px; " align="center"><?=lang('vw_calendario.lbl_hora')?></th>
				<th style="width: 40px; " align="center"><?=lang('vw_calendario.lbl_grupo')?></th>
				<th style="width: 80px; " align="center"><?=lang('vw_calendario.lbl_sede')?></th>
				<th style="width: 120px; " align="center"><?=lang('vw_calendario.lbl_local')?></th>
				<th style="width: 10px; " colspan="3" align="center"><?=lang('vw_calendario.lbl_marcador')?></th>
				<th style="width: 120px; " align="center"><?=lang('vw_calendario.lbl_visitante')?></th>
			</tr>
		</table>
		<center>
			<table id="tb_guardar" style="display:none;">
			<tr>
				<td><input type="button" id="btn_guardar" name="btn_guardar" value="Guardar" onclick="guardarPronostico();" /></td>
			</tr>
			</table>
		</center>
	</div>


