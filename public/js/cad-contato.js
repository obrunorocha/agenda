$(document).ready(function()
{	
	$('#submit').click(function()
	{
		var name    = $('#name').val();
		var email   = $('#email').val();
		var gender  = $('#gender').val();
		var street  = $('#street').val();
		var neigh   = $('#neighborhood').val();
		var city    = $('#city').val();
		var state   = $('#state').val();
		var country = $('#country').val();
		var type    = $('#type').val();
		var number  = $('#number').val();

		if(name != '' && email != '' && gender != '' && street != '' && neigh != '' && 
			city != '' && street != '' && country != '' && type != '' && number != ''){
			if(state != 'Selecione'){
				$.ajax({
					url :'../controller/ctrl_cad_contato.php',
				    type:'POST',
				    data:
				    {
				    	name:name, email:email, gender:gender, street:street, neighborhood:neigh, 
				    	city:city, state:state, country:country, type:type, number:number
				    },

				    success: function(response)
				    {
				    	console.log(response);
				    	$("#contact-message").html(response);
			            $("#contact-message").css("color", "green");
			            window.location='../../app/view/painel.php'; 
				    },

				 	error: function(response)
				 	{
				 		console.log(response);
				 		$("#contact-message").html(response);
				 		$("#contact-message").css("color", "red");
				 	}
				});
			}else{
				$("#contact-message").html("Por favor, selecione a UF.");
				$("#contact-message").css("color", "red");
			}
		}
		else{
				$("#contact-message").html("Por favor, preencha os campos obrigatórios do formulário.");
				$("#contact-message").css("color", "red");
			}
	});
});