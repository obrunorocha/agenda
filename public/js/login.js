$(document).ready(function()
{
	$('#submit').click(function()
	{
		var email = $('#email').val();
		var pass  = $('#password').val();

		if(email != '' && pass != '')
		{
			$.ajax({
				url :'../../app/controller/ctrl_login.php',
			    type:'POST',
			    data:{
			    	email:email, password:pass
			    },
			    success: function(result)
			    {
			    	if(result == email)
			    	{
			    		window.location.href = '../../app/view/painel.php';
			    	}
			    	else
			    	{
			    		console.log(result);
			    		$("#login-message").html(result);
			    		$("#login-message").css("color", "red");
			    	}
			    },
			 	error: function(response)
			 	{
			 		console.log(response);
			 		$("#login-message").html(response);
			 		$("#login-message").css("color", "red");
			 	}
			});
		}
		else
		{
			$("#login-message").html("Por favor, preencha todos os campos.");
			$("#login-message").css("color", "red");
		}
	});
});