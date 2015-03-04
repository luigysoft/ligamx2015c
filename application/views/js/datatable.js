$(document).ready(function(){
	$('#example').dataTable({
		"bPaginate": false,
		"bSort": false,
		"aoColumns": [ 
			{ "sWidth": "200px" },
			{ "sWidth": "200px" },
			null,
			{ "sWidth": "200px" },
			{ "sWidth": "200px" }
		]
	})
	.columnFilter({ sPlaceHolder: "head:before",
		aoColumns: [ 
			{ type: "text" },
			{ type: "text" },
			null,
			{ type: "text" },
			{ type: "text" }
		]

	});
});

function salir(){
	var url = "salir/";
	window.open(url, "_self");
}