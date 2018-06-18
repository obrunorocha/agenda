$(document).ready(function()
{
	$('#submit').click(function()
	{
		var n = $('#name').val();
		var e = $('#email').val();
		var s = $('#pass').val();
		var c = $('#confirm').val();

		if(n != '' && e != '' && s != '' && c != '')
		{
			if(s != c)
			{
				$("#admin-message").html("Falha na confirmação de senha, digite senha novamente.");
				$("#admin-message").css("color", "red");
			}
			else
			{
				$.ajax({
					url :'../controller/ctrl_cad_admin.php',
				    type:'POST',
				    data:
				    {
				    	name:n, email:e, password:s
				    },

				    success: function(response)
				    {
				    	console.log(response);
				    	$("#admin-message").html(response);
		                $("#admin-message").css("color", "green");
				    },

				 	error: function(response)
				 	{
				 		console.log(response);
				 		$("#admin-message").html(response);
				 		$("#admin-message").css("color", "red");
				 	}
				});
			}
		}
		else{
				$("#admin-message").html("Por favor, preencha todos os campos do formulário.");
				$("#admin-message").css("color", "red");
			}
	});
});