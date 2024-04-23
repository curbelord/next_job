$(document).ready(function () {

    const regex = {
        nombre: /^[A-Z][a-z]*(\s[A-Z][a-z]*)*$/,
        apellidos: /^[A-Z][a-z]*(\s[A-Z][a-z]*)?$/,
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        telefono: /^[9|6]\d{8}$/,
        contrasena: /^.{6,}$/,
    };

    var nombre = $('#nombre');
    var apellidos = $('#apellidos');
    var fecha_nacimiento = $('#fecha_nacimiento');
    var telefono = $('#telefono');
    var email = $('#email');
    var password = $('#password');
    var password_confirmation = $('#password_confirmation');

    function campoNoNulo(campo) {
        return campo.val() !== null && campo.val().trim() !== "";
    }

    function validarNombre() {
        if (campoNoNulo(nombre)) {

            console.log('prueba');

            if (regex.nombre.test(nombre.val())) {
                eliminarError(nombre);
                return true;
            } else {
                mostrarError(nombre);
                return false;
            }
        } else {

            console.log('prueba2');

            mostrarError(nombre);
            return false;
        }
    }

    function validarApellidos() {

        if (campoNoNulo(apellidos)) {
            if (regex.apellidos.test(apellidos.val())) {
                eliminarError(apellidos);
                return true;
            } else {
                mostrarError(apellidos);
                return false;
            }
        } else {
            mostrarError(apellidos);
            return false;
        }
    }

    function validarFechaNacimiento() {
        if (campoNoNulo(fecha_nacimiento)) {
            eliminarError(fecha_nacimiento);
            return true;
        } else {
            mostrarError(fecha_nacimiento);
            return false;
        }
    }

    function validarTelefono() {
        if (campoNoNulo(telefono)) {
            if (regex.telefono.test(telefono.val())) {
                eliminarError(telefono);
                return true;
            } else {
                mostrarError(telefono);
                return false;
            }
        } else {
            mostrarError(telefono);
            return false;
        }
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

    function validarPasswordConfirmation() {
        if (campoNoNulo(password_confirmation)) {
            if (password.val() === password_confirmation.val()) {
                eliminarError(password_confirmation);
                return true;
            } else {
                mostrarError(password_confirmation);
                return false;
            }
        } else {
            mostrarError(password_confirmation);
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

    $('#boton_registrar').click(function () {

        $('.registro input, .registro select').each(function () {
            const campo = this.name;

            if (campo === "nombre") {
                validarNombre();
            } else if (campo === "apellidos") {
                validarApellidos();
            } else if (campo === "fecha_nacimiento") {
                validarFechaNacimiento();
            } else if (campo === "telefono") {
                validarTelefono();
            } else if (campo === "email") {
                validarEmail();
            } else if (campo === "password") {
                validarPassword();
            } else if (campo === "password_confirmation") {
                validarPasswordConfirmation();
            }
        });
            
        if (
               validarNombre() 
            && validarApellidos() 
            && validarFechaNacimiento() 
            && validarTelefono() 
            && validarEmail() 
            && validarPassword() 
            && validarPasswordConfirmation()
            ) {

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "success",
                title: "Registro completado con éxito."
            });

            $('#boton_registrar').attr('type', 'submit');

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