<!doctype html>
<html lang="en">
	<head>
		<title><?=lang('vw_gral.ttl_sistema')?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="<?php echo base_url();?>application/views/js/jquery-ui-1.11.0.custom/jquery-ui.css">
		<script src="<?php echo base_url();?>application/views/js/jquery-ui-1.11.0.custom/external/jquery/jquery.js"></script>
		<script src="<?php echo base_url();?>application/views/js/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
		
		<script src="<?php echo base_url();?>application/views/js/tabs.js"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>application/views/css/tabs.css">

		
		<!-- datatable -->
		<link rel="stylesheet" href="<?php echo base_url();?>application/views/media/css/demo_page.css">
		<link rel="stylesheet" href="<?php echo base_url();?>application/views/media/css/demo_table.css">
		<link rel="stylesheet" href="<?php echo base_url();?>application/views/media/css/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="<?php echo base_url();?>application/views/extras/TableTools/mediamedia/css/TableTools.css">
		<link rel="stylesheet" href="<?php echo base_url();?>application/views/css/datatable.css">

		
		<script src="<?php echo base_url();?>application/views/media/js/jquery-1.4.4.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>application/views/media/js/jquery.dataTables.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>application/views/media/js/jquery-ui.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>application/views/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>application/views/extras/TableTools/mediamedia/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>application/views/extras/TableTools/mediamedia/js/TableTools.js"></script>
		
		<script src="<?php echo base_url();?>application/views/js/datatable.js"></script>
		<script src="<?php echo base_url();?>application/views/js/general.js"></script>
		
	</head>
	<body style='background-image: url("<?php echo base_url();?>application/views/imagenes/equipos/<?php echo $imagen; ?>") !important; background-position: left top;background-repeat: repeat !important;'>
		<div>
			<img src="<?php echo base_url();?>application/views/imagenes/encabezadomx.png" alt="copa" title="copa"/>
		</div>
		    <input type="hidden" id="pathURL" name="pathURL"  value="<?=base_url()?>" />
		<div id="tabs">
			<ul>
				<li><a href="<?php echo base_url();?>index.php/inicio/equipos"><?=lang('vw_tab.ttl_cameponato')?></a></li>
				<li><a href="<?php echo base_url();?>index.php/inicio/reglamento"><?=lang('vw_tab.ttl_reglamento')?></a></li>
				<li><a href="<?php echo base_url();?>index.php/inicio/calendario"><?=lang('vw_tab.ttl_calendario')?></a></li>
				<li><a href="<?php echo base_url();?>index.php/inicio/pronosticos"><?=lang('vw_tab.ttl_pronosticos')?></a></li>
				<li><a href="<?php echo base_url();?>index.php/inicio/tablaGeneral"><?=lang('vw_tab.ttl_tablagral')?></a></li>
				<li><a href="<?php echo base_url();?>index.php/inicio/publicaciones"><?=lang('vw_tab.ttl_pulicar')?></a></li>
				<li><a href="<?php echo base_url();?>index.php/inicio/blog"><?=lang('vw_tab.ttl_blog')?></a></li>
				<li><a href="<?php echo base_url();?>index.php/inicio/comentarios"><?=lang('vw_tab.ttl_comentarios')?></a></li>
				<li><a href="#tabs-1" onclick="salir();">Salir</a></li>
			</ul>
		</div>
	</body>
</html>
