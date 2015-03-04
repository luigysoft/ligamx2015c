<h2>Tabla general</h2><br />
				
				<table class="hoverTable">
				  <tr>
				    <th style="width: 30px; " align="center">Posición</th>
				    <th style="width: 120px; " align="center">Participante</th>
				    <th style="width: 80px; " align="center">Aciertos</th>
				    <th style="width: 40px; " align="center">Puntos</th>
				  </tr>
				  <?php 
							if(!empty($posiciones)):
								foreach($posiciones as $registros){ ?>
				  <tr>
				    <td align="center"><?php echo $registros['id_posicion']; ?></td>
				    <td align="center"><?php echo $registros['alias']; ?></td>
				    <td align="center"><?php echo $registros['aciertos']; ?></td>
				    <td align="center"><?php echo $registros['puntos']; ?></td>
				  </tr>
				  <?php 
								} 
							endif;
							?>
				</table>
				