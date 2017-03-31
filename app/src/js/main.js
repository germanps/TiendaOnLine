//Desplegables
jQuery(document).ready(function($) {
	$('#seeUsers').click(function(e) {
		$(this).siblings('#showUsers').toggle(400);
	});
});
//Objeto AJAX
function objetoAjax(){
	var xmlhttp = false;
	/*IExplorer*/
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(E){
		xmlhttp = false;
	}
	/*otros navegadores*/
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest;
	}
	return xmlhttp;
}


// Añadir Usuario
function addUsuario() {
	console.log('entra');
    var nameUserId = $("#nameId").val();
    var passwordUserId = $("#passwordId").val();
    var tipoUserId = $("#tipoId").val();
    alert(nameUserId);
    //$("#add_new_user_modal").modal("hide");
    //Control errores
    if (nameUserId == "") {
        alert("El nombre es requerido");
    }
    else if (passwordUserId == "") {
        alert("El password es requerido");
    }
    else if (tipoUserId == "") {
        alert("El tipo de usuario es requerido");
    }
    else {
        // Añadimos usuario
        console.log(nameUserId+passwordUserId+tipoUserId);

        var ajax = objetoAjax();
        ajax.open("POST", "../../controller/new_user.php", true);
        
        // $.post("ajax/create.php", {
        //     nameId: nameId,
        //     passwordId: passwordId,
        //     tipoId: tipoId
        // }, function (data, status) {
        //     // close the popup
        //     $("#add_new_user_modal").modal("hide");

        //     // read users again
        //     readRecords();

        //     // clear fields from the popup
        //     $("#nameUserId").val("");
        //     $("#passwordUserId").val("");
        //     $("#tipoUserId").val("");
        // });
    }
}
/*****************************************************/
// READ records
function readRecords() {
    $.get("ajax/read.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

function GetUserDetails(id) {
    // Add User ID to the hidden field
    $("#hidden_user_id").val(id);
    $.post("ajax/details.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assign existing values to the modal popup fields
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_email").val(user.email);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var first_name = $("#update_first_name").val();
    first_name = first_name.trim();
    var last_name = $("#update_last_name").val();
    last_name = last_name.trim();
    var email = $("#update_email").val();
    email = email.trim();

    if (first_name == "") {
        alert("First name field is required!");
    }
    else if (last_name == "") {
        alert("Last name field is required!");
    }
    else if (email == "") {
        alert("Email field is required!");
    }
    else {
        // get hidden field value
        var id = $("#hidden_user_id").val();

        // Update the details by requesting to the server using ajax
        $.post("ajax/update.php", {
                id: id,
                first_name: first_name,
                last_name: last_name,
                email: email
            },
            function (data, status) {
                // hide modal popup
                $("#update_user_modal").modal("hide");
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/delete.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}


$(document).ready(function () {
    // READ records on page load
    readRecords(); // calling function
});

/*

jQuery(document).ready(function($) {

	//Mostrar/esconder info parking
	$('#smartCars a').click(function(e) {
		$('#smartCarsTable').slideToggle(200);
		printAjaxSmall();
	});
	$('#bigCars a').click(function(e) {
		$('#bigCarsTable').slideToggle(200);
		printAjaxBig();
	});

	function printAjaxSmall(){
		$.ajax({
		  type: 'GET',
		  url: '../controller/small_ajax.php',
		  data: 'id=testdata',
		  cache: false,
		  success: function(data) {
		    result = data.split('~');
		    //imprimimos la tabla con valores del servidor
		    $('#smartCarsTable table td span.resul').each(function(index, el) {
		    	if (result !== undefined) {
		    		$(this).html(result[index]);
		    	}	
		    	
		    });
		  },
		});
	}

	function printAjaxBig(){
		$.ajax({
		  type: 'GET',
		  url: '../controller/big_ajax.php',
		  data: 'id=testdata',
		  cache: false,
		  success: function(data) {
		    result = data.split('~');
		    //imprimimos la tabla con valores del servidor
		    $('#bigCarsTable table td span.resul').each(function(index, el) {
		    	if (result !== undefined) {
		    		$(this).html(result[index]);
		    	}
		    	
		    });
		  },
		});
	}

});

*/