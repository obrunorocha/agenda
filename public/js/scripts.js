// Add Record 
function addRecord() {
    // get values
    var name    = $("#name").val();
    var email   = $("#email").val();
    var gender  = $("#gender").val();
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
                    $("#add_new_record_modal").modal("hide");
                    $("#name").val("");
                    $("#email").val("");
                    $("#gender").val("");
                    $('#street').val("");
                    $('#neighborhood').val("");
                    $('#city').val("");
                    $('#state').val("");
                    $('#country').val("");
                    $('#number').val("");
                    $('#type').val("");

                    $('#add_new_record_modal').modal('hide');
                    window.location='../../app/view/agenda.php'; 
                },

                error: function(response)
                {
                    console.log(response);
                    $("#contact-message").html(response);
                    $("#contact-message").css("color", "red");
                }
            });
        }else{
            alert("Por favor, selecione a UF.");
        }
    }
    else{
            alert("Por favor, preencha os campos obrigatórios do formulário.");
        }
}

// READ records
function readRecords() {
    $.get("../controller/ctrl_listall_contato.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function DeleteUser(id) {
    var conf = confirm("Tem certeza de que deseja mesmo excluir este contato?");
    if (conf == true) {
        $.post("../controller/ctrl_del_contato.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

$(document).on('click', '.list', function()
{
    var id = $(this).attr("id");

    $.ajax({
        url :'../../app/view/modalup.php',
        method:'POST',
        data:
        {
            id:id
        },

        success: function(response)
        {
            $('#result').html(response);
        },

        error: function(response)
        {
            console.log(response);
        }
    });
});

function UpdateUserDetails() {
    // get values
    var id      = $("#hidden_user_id").val();
    var name    = $("#update_name").val();
    var email   = $("#update_email").val();
    var gender  = $("#update_gender").val();
    var street  = $('#update_street').val();
    var neigh   = $('#update_neighborhood').val();
    var city    = $('#update_city').val();
    var state   = $('#update_state').val();
    var country = $('#update_country').val();
    var type    = $('#update_type').val();
    var number  = $('#update_number').val();

    var id = $("#hidden_user_id").val();

    $.post("../controller/ctrl_upd_contato.php",{
            idcontato:id,
            name:name, 
            email:email, 
            gender:gender, 
            street:street, 
            neighborhood:neigh,
            city:city, 
            state:state, 
            country:country, 
            type:type, 
            number:number
    },function (data, status) {
            console.log(data);
            $('#update_user_modal').modal('hide');
            readRecords();
        }
    );
}

$(document).ready(function()
{
    readRecords();
});