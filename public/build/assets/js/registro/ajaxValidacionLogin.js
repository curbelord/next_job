$(document).ready(function () {

    const regex = {
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        contrasena: /^.{6,}$/,
    };

    var email = $('#email');
    var password = $('#password');

    function campoNoNulo(campo) {
        return campo.val() !== null && campo.val().trim() !== "";
    }

    function validarEmail() {
        if (campoNoNulo(email)) {
            if (regex.email.test(email.val())) {
                eliminarError(email);
                return true;
            } else {
                mostrarError(email);
                return false;
            }
        } else {
            mostrarError(email);
            return false;
        }
    }

    function validarPassword() {
        if (campoNoNulo(password)) {
            if (regex.contrasena.test(password.val())) {
                eliminarError(password);
                return true;
            } else {
                mostrarError(password);
                return false;
            }
        } else {
            mostrarError(password);
            return false;
        }
    }

    function eliminarError(campo) {
        campo.attr('placeholder', campo);
        campo.removeClass("invalid");
    }

    function mostrarError(campo) {
        campo.attr('placeholder', campo.next().text());
        campo.addClass("invalid");
    }

    $('#boton_iniciar_sesion').click(function () {

        $('.login input, .login select').each(function () {
            const campo = this.name;

            if (campo === "email") {
                validarEmail();
            } else if (campo === "password") {
                validarPassword();
            }
        });
            
        if (validarEmail() && validarPassword()) {

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "success",
                title: "Se ha iniciado sesión con éxito."
            });

            $('#boton_iniciar_sesion').attr('type', 'submit');

        } else {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "error",
                title: "¡Por favor, rellene todos los campos correctamente!"
            });
        }
    });

});