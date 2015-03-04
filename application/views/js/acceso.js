	function validar(){
		var usu = $("#usuario").val();
		var pass = $("#contrasenia").val();
		
		var url = $('#pathURL').val() + "index.php/acceso/autenticar";
		
		if(usu == "")
		{
			alert('Favor de escribir el usuario.');
			$('#usuario').focus();
			return false;
		}else if(pass == "")
		{
			alert('Favor de escribir la contrase\u00f1a.');
			$('#contrasenia').focus();
			return false;
		}
		
		$.post(url,{ 
			usuario:						$('#usuario').val(), 
			contrasenia:					$('#contrasenia').val()
		},function(data){ 
			if(data == 1)
				$(location).attr('href', $('#pathURL').val() + 'index.php/inicio');
			else
			{
				alert(data);
				return false;
			}
		});
	}
	
	$(document).ready(function(){
		if($("#error").val() =="1")
		{
			alert($("#err_empty").val());
		}else if($("#error").val() =="2")
		{
			alert($("#err_invalid").val());
		}
	});



