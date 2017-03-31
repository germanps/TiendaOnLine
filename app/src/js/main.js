//Desplegables
jQuery(document).ready(function($) {
	$('#seeUsers').click(function(e) {
		$(this).siblings('#showUsers').toggle(400);
	});
});

//Objeto AJAX
/*function objectAjax(){
	var xmlhttp = false;
	//IExplorer
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(E){
		xmlhttp = false;
	}
	//otros navegadores
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest;
	}
	return xmlhttp;
}*/
//Add User
/*function newUser(){
    var nombre = document.addUser.nameUser.value;
    var password = document.addUser.passwordUser.value;
    var tipo = document.addUser.tipoUser.value;

    //llamada ajax
    var ajax = objectAjax();
    ajax.open("POST","../../controller/new_user.php", true);
    ajax.onreadystatechange = function(){
        if (ajax.readyState == 4) {
            alert('Los datos se han guardado con éxito');
            window.location.reload(true);
        }
    }
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("nombre="+nombre+"&password="+password+"&tipo="+tipo);
}*/