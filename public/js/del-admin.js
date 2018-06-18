$(document).on('click', '.delete', function()
{
	var id = $(this).attr("id");
	console.log(id);

	if(confirm("Você deseja deletar a sua conta?"))
	{
		$.ajax({
			url :'../controller/ctrl_del_admin.php',
		    method:'POST',
		    data:
		    {
		    	id:id
		    },

		    success: function(data)
		    {
		    	console.log(data);
		    	alert(data);
		    	window.location='../../index.php';
		    }
		});
	}
	else
	{
		return false;
	}

});