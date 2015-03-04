<h2>Pronósticos</h2><br />
				<div id="demo" style="/*border-width: 1px; border-style: dashed; border-color: #4E6CA3;*/ width:100%;">
						<table id="example" class="hoverTable">
							<thead>
								<tr>
									<th style="width:350px">Partido</th>
									<th style="width:150px">Local</th>
									<th style="width:150px">Marcador</th>
									<th style="width:150px">Visitante</th>
									<th style="width:150px">Participante</th>
								</tr>
								<tr>
									<th>Partido</th>
									<th>Local</th>
									<th>Marcador</th>
									<th>Visitante</th>
									<th>Participante</th>
								</tr>
							</thead>
							<tbody> 
							<?php 
				if(!empty($pronosticos)):
					foreach($pronosticos as $registros){ ?>
				  <tr>
				    <td align="center"><?php echo $registros['partido']; ?></td>
				    <td align="center"><?php echo $registros['local']; ?></td>
				    <td align="center"><?php echo $registros['goles_local']; ?>&nbsp;-&nbsp;<?php echo $registros['goles_visit']; ?></td>
				    <td align="center"><?php echo $registros['visitante']; ?></td>
				    <td align="center"><?php echo $registros['alias']; ?></td>
				  </tr>
				  <?php 
					} 
				endif;
				?>
							</tbody>
							
						</table>
					</div>