<html>
<head>
	<title><?=lang('vw_gral.ttl_sistema')?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!--<link href="<?php echo base_url();?>application/views/css/style.css" rel="stylesheet" type="text/css">-->
	<script type="text/javascript" src="<?php echo base_url();?>application/views/js/jquery/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>application/views/js/acceso.js"></script>
	<style type="text/css">
		.centrar
		{
			background-image: url('<?php echo base_url();?>application/views/imagenes/source_xcf/login.png'); 
			background-repeat: no-repeat; 
			
			
			position: absolute;
			top:50%;
			left:50%;
			width:340px;
			
			margin-left:-170px;
			
			height:134px;
			
			margin-top:-67px;
			/*border:1px solid #808080;*/
			padding:5px;
		}
	</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="text-align:center;">
	<input type="hidden" id="error" name="error" value="<?=$error?>" />
	<input type="hidden" id="err_empty" name="err_empty" value="<?=lang('vw_acceso.mns_errorVacio')?>" />
	<input type="hidden" id="err_invalid" name="err_invalid" value="<?=lang('vw_acceso.mns_errorInvalidate')?>" />
	<input type="hidden" id="pathURL" name="pathURL" value="<?php echo base_url();?>" />
		<?php 
			$attributes = array('name' => 'frm_login', 'id' => 'frm_login');
			echo form_open('acceso/autenticar', $attributes);
		?>
		<div class="centrar">
		<br/>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
				<tr>
					<td width="50%" align="right">
						<label for="usuario"><?=lang('vw_acceso.lbl_usuario')?></label>
					</td>
					<td>
						<input type="text"  id="usuario" name="usuario" class="usuario">
					</td>
				</tr>
				<tr>
					<td width="50%" align="right">
						<label for="pass"><?=lang('vw_acceso.lbl_contrasenia')?></label>
					</td>
					<td>
						<input type="password"  id="contrasenia" name="contrasenia" class="pass">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input class="entrar" name="entrar"  type="submit" id="entrar" value="<?=lang('vw_acceso.btn_entrar')?>"></td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>
