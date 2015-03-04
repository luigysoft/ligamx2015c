	<h2><?=lang('vw_tab.ttl_calendario')?></h2>
	<?php 
		if($nodata == false ){ echo $this->lang->line('vw_gral.tyn_nodatos'); exit; }
		$i = count($jornadas);
		$a = 0;
		foreach(array_reverse($jornadas) as $nombreRol){

	?>
		<br />
		<center>
			<h3>
				<span style="cursor:pointer;" onclick="visor_toogle('calendar_<?php echo $i; ?>')">
					<?php echo $nombreRol; ?>
				</span>
			</h3>
		</center>
		<table class="hoverTable" id="calendar_<?php echo $i; ?>" <?php if($a != 0) { ?> style="display:none;" <?php }?> >
			<tr>
				<th style="width: 30px; " align="center"><?=lang('vw_calendario.lbl_partido')?></th>
				<th style="width: 120px; " align="center"><?=lang('vw_calendario.lbl_fecha')?></th>
				<th style="width: 80px; " align="center"><?=lang('vw_calendario.lbl_hora')?></th>
				<th style="width: 40px; " align="center"><?=lang('vw_calendario.lbl_grupo')?></th>
				<th style="width: 80px; " align="center"><?=lang('vw_calendario.lbl_sede')?></th>
				<th style="width: 120px; " align="center"><?=lang('vw_calendario.lbl_local')?></th>
				<th style="width: 20px; " colspan="3" align="center"><?=lang('vw_calendario.lbl_marcador')?></th>
				<th style="width: 120px; " align="center"><?=lang('vw_calendario.lbl_visitante')?></th>
			</tr>
			<?php 
					if(!empty($calendario)):
						foreach($calendario as $registros){ 
								if($registros['jornada'] == $i){
			?>
							
			<tr>
				<td align="center"><?php echo $registros['id_partido']; ?></td>
				<td align="center"><?php echo $registros['fecha']; ?></td>
				<td align="center"><?php echo $registros['hora']; ?></td>
				<td align="center"><?php echo $registros['grupo']; ?></td>
				<td align="center"><?php echo ($registros['sede']); ?></td>
				<td align="center"><?php echo ($registros['local']); ?></td>
				<td align="center"><?php echo $registros['goles_local']; ?></td>
				<td align="center">&nbsp;-&nbsp;</td>
				<td align="center"><?php echo $registros['goles_visit']; ?></td>
				<td align="center"><?php echo ($registros['visitante']); ?></td>
			</tr>
			<?php 
							}
						} 
					endif;
					?>
		</table>
	<?php 
						$i--;	
            $a++;	
		} 
	?>
