$(document).ready(function() {
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
});

function validateNickname($nick) {
    var nickReg = /^[a-zA-Z0-9_.-]*$/; //Sólo puede contener letras, números y guión al piso
    return nickReg.test( $nick );
    return true;
}

function validateName($name) {
    if ($name.length > 4) { //Mínimo 5 caracteres
        return true;
    } else {
        return false;
    }
}

function validatePassword($pass) {
    var passReg = /(?:[A-Z].*[0-9])|(?:[0-9].*[A-Z])/; //Debe contener mínimo una mayúscula y un número
    return passReg.test( $pass );
    return true;
}

function validateMovieYear($year) {

	var currentYear = new Date().getFullYear();
	console.log(currentYear);

	if($year <= currentYear && $year >= 1985){ //Entre el inicio del cine y el año actual
		return true;
	}else{
		return false;
	}
}   

function tryRegisterMovie() {
    if ($("#title").val() != "") {

        if ($("#year").val() != "") {

            if (!validateMovieYear($("#year").val())) {
                $("#year").focus();
                alert("El año no es válido.");
                return false;
            }

            $.post("includes/admin/services.php", {
                    type: "TryRegisterMovie",
                    data1: $("#title").val(),
                    data2: $("#synopsis").val(),
                    data3: $("#year").val()
                })
                .done(function(data) {
                    switch (data) {
                        case "-1":
                            alert("Error de registro.");
                            break;
                        case "0":
                            alert("Registro exitoso.");
                            window.location.href = 'movies';
                            break;
                    }
                });
                                   

        } else {
            $("#year").focus();
            alert("El año es requerido.");
        }


    } else {
        $("#title").focus();
        alert("El título es requerido.");
    }
}

function tryUpdateMovie() {
    if ($("#title").val() != "") {

        if ($("#year").val() != "") {

            if (!validateMovieYear($("#year").val())) {
                $("#year").focus();
                alert("El año no es válido.");
                return false;
            }

            $.post("includes/admin/services.php", {
                    type: "TryUpdateMovie",
                    data1: $("#title").val(),
                    data2: $("#synopsis").val(),
                    data3: $("#year").val(),
                    data4: $("#id_movie").val()
                })
                .done(function(data) {
                    switch (data) {
                        case "-1":
                            alert("Error al editar.");
                            break;
                        case "0":
                            alert("Película editada.");
                            break;
                    }
                });
                                   

        } else {
            $("#year").focus();
            alert("El año es requerido.");
        }


    } else {
        $("#title").focus();
        alert("El título es requerido.");
    }
}

function tryRegisterUser() {
    if ($("#nickname").val() != "") {

        if (!validateNickname($("#nickname").val())) {
            $("#nickname").focus();
            alert("El nickname no es válido.");
            return false;
        }

        if ($("#name").val() != "") {

            if (!validateName($("#name").val())) {
                $("#name").focus();
                alert("El nombre no es válido.");
                return false;
            }

            if ($("#password").val() != "") {

                if (!validatePassword($("#password").val())) {
                    $("#password").focus();
                    alert("El password no es válido.");
                    return false;
                }


                if ($("#password2").val() != "") {

                    if ($("#password").val() != $("#password2").val()) {
                        $("#password").focus();
                        alert("La contraseñas no coinciden.");
                    } else {
                        $.post("includes/admin/services.php", {
                                type: "TryRegisterUser",
                                data1: $("#nickname").val(),
                                data2: CryptoJS.MD5($("#password").val()).toString(),
                                data3: $("#name").val()
                            })
                            .done(function(data) {
                                switch (data) {
                                    case "-1":
                                        alert("Error de registro.");
                                        break;
                                    case "0":
                                        alert("Registro exitoso.");
                                        window.location.href = 'users';
                                        break;
                                    case "1":
                                        alert("Este nickname ya está registrado.");
                                        break;
                                }
                            });
                    }

                } else {
                    $("#password2").focus();
                    alert("La confirmación de la contraseña es requerida.");
                }

            } else {
                $("#password").focus();
                alert("La contraseña es requerida.");
            }

        } else {
            $("#name").focus();
            alert("El nombre es requerido.");
        }


    } else {
        $("#nickname").focus();
        alert("El nickname es requerido.");
    }
}

function tryUpdateUser() {
    if ($("#nickname").val() != "") {

        if (!validateNickname($("#nickname").val())) {
            $("#nickname").focus();
            alert("El nickname no es válido.");
            return false;
        }

        if ($("#name").val() != "") {

            if (!validateName($("#name").val())) {
                $("#name").focus();
                alert("El nombre no es válido.");
                return false;
            }
            $.post("includes/admin/services.php", {
                    type: "TryUpdateUser",
                    data1: $("#nickname").val(),
                    data2: $("#name").val(),
                    data3: $("#id_user").val()
                })
                .done(function(data) {
                    switch (data) {
                        case "-1":
                            alert("Error al editar.");
                            break;
                        case "0":
                            alert("Usuario editado.");
                            break;
                    }
                });
        } else {
            $("#name").focus();
            alert("El nombre es requerido.");
        }


    } else {
        $("#nickname").focus();
        alert("El nickname es requerido.");
    }
}

function tryUpdateUserPassword() {

        if ($("#password").val() != "") {

            if (!validatePassword($("#password").val())) {
                $("#password").focus();
                alert("El password no es válido.");
                return false;
            }

            if ($("#password2").val() != "") {

                if ($("#password").val() != $("#password2").val()) {
                    $("#password").focus();
                    alert("La contraseñas no coinciden.");
                } else {
                    $.post("includes/admin/services.php", {
                            type: "tryUpdateUserPassword",
                            data1: $("#id_user").val(),
                            data2: CryptoJS.MD5($("#password").val()).toString()
                        })
                        .done(function(data) {
                            switch (data) {
		                        case "-1":
		                            alert("Error al editar.");
		                            break;
		                        case "0":
		                            alert("Contraseña editada.");
		                            break;
		                    }
                        });
                }

            } else {
                $("#password2").focus();
                alert("La confirmación de la contraseña es requerida.");
            }

        } else {
            $("#password").focus();
            alert("La contraseña es requerida.");
        }
}

function tryDeleteUser() {

	if($("#id_user").val() == localStorage.getItem('integro_id')){

		alert("NO te puedes eliminar a ti mismo :)");

	}else{
		$.post("includes/admin/services.php", {
            type: "TryDeleteUser",
            data1: $("#id_user").val()
        })
        .done(function(data) {
            switch (data) {
                case "-1":
                    alert("Error al eliminar.");
                    break;
                case "0":
                    alert("Usuario eliminado.");
                    window.location.href = 'users';
                    break;
            }
        });
	}

    
    
        
}

function tryDeleteMovie() {
    
    $.post("includes/admin/services.php", {
            type: "TryDeleteMovie",
            data1: $("#id_movie").val()
        })
        .done(function(data) {
            switch (data) {
                case "-1":
                    alert("Error al eliminar.");
                    break;
                case "0":
                    alert("Película eliminada.");
                    window.location.href = 'movies';
                    break;
            }
        });
        
}

function tryLogin() {
    if ($("#username").val().length > 4) {

        if ($("#password").val() != "") {

            $.post("includes/admin/services.php", {
                    type: "TryLogin",
                    data1: $("#username").val(),
                    data2: CryptoJS.MD5($("#password").val()).toString()
                })
                .done(function(data) {
                    localStorage.clear();
                    switch (data) {
                        case "0":
                            $("#username").focus();
                            alert("Los datos no coinciden");
                            break;
                        default:
                            var integro_data = JSON.parse(data)[0];
                            localStorage.setItem("integro_id", integro_data.id);
                            localStorage.setItem("integro_name", integro_data.name);
                            localStorage.setItem("integro_nick", integro_data.nickname);

                            window.location.href = 'dashboard';

                            break;

                    }
                });

        } else {
            $("#password").focus();
            alert("La contraseña es requerida.");
        }

    } else {
        $("#username").focus();
        alert("El usuario es muy corto (mínimo 5 caracteres)");
    }
}

function tryLogout() {
    localStorage.clear();
    window.location.href = './';
}