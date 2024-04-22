$(document).ready(function () {

    const formulario = {
        nombre: "",
        apellidos: "",
        genero: "",
        fecha_nacimiento: "",
        direccion: "",
        telefono: "",
        email: "",
        password: "",
        password_confirmation: "",
    };

    const regex = {
        nombre: /^[A-Z][a-z]*(\s[A-Z][a-z]*)*$/,
        apellidos: /^[A-Z][a-z]*(\s[A-Z][a-z]*)?$/,
        genero: /^(Hombre|Mujer|Otro)$/,
        fecha_nacimiento: /^(((0[1-9]|1[0-9]|2[0-8])\/(0[1-9]|1[0-2]))|((29|30)\/(0[13-9]|1[0-2]))|(31\/(0[13578]|1[02]))|((0[1-9]|1[0-9]|2[0-9])\/02))\/\d{4}$/,
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        telefono: /^[9|6]\d{8}$/,
        contrasena: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/,
    };

    var nombre = $('#nombre');
    var apellidos = $('#apellidos');
    var genero = $('#genero');
    var fecha_nacimiento = $('#fecha_nacimiento');
    var direccion = $('#direccion');
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

    function validarGenero() {
        if (campoNoNulo(genero)) {
            if (regex.genero.test(genero.val())) {
                eliminarError(genero);
                return true;
            } else {
                mostrarError(genero);
                return false;
            }
        } else {
            mostrarError(genero);
            return false;
        }
    }

    function validarFechaNacimiento() {
        if (campoNoNulo(fecha_nacimiento)) {
            if (regex.fecha_nacimiento.test(fecha_nacimiento.val())) {
                eliminarError(fecha_nacimiento);
                return true;
            } else {
                mostrarError(fecha_nacimiento);
                return false;
            }
        } else {
            mostrarError(fecha_nacimiento);
            return false;
        }
    }

    function validarDireccion() {
        if (campoNoNulo(direccion)) {
            eliminarError(direccion);
            return true;
        } else {
            mostrarError(direccion);
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
        campo.next().removeClass("error-visible");
        campo.removeClass("invalid");
    }

    function mostrarError(campo) {
        campo.next().addClass("error-visible");
        campo.addClass("invalid");
    }

    $('#boton_registrar').click(function () {

        $('.registro input, .registro select').each(function () {
            const campo = this.name;

            if (campo === "nombre") {
                validarNombre();
            } else if (campo === "apellidos") {
                validarApellidos();
            } else if (campo === "genero") {
                validarGenero();
            } else if (campo === "fecha_nacimiento") {
                validarFechaNacimiento();
            } else if (campo === "direccion") {
                validarDireccion();
            } else if (campo === "telefono") {
                validarTelefono();
            } else if (campo === "email") {
                validarEmail();
            } else if (campo === "password") {
                validarPassword();
            } else if (campo === "password_confirmation") {
                validarPasswordConfirmation();
            }
            
            /*function actualizarFormularioYEliminarError() {
                formulario[campo] = valor;
                mensajeError.removeClass("error-visible");
                $(`input#${campo}`).removeClass("invalid");
            }
            
            function mostrarError() {
                mensajeError.addClass("error-visible");
                $(`input#${campo}`).addClass("invalid");
            }*/
        });
            
        if (
               validarNombre() 
            && validarApellidos() 
            && validarGenero() 
            && validarFechaNacimiento() 
            && validarDireccion() 
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
                icon: "error",
                title: "Registro completado con éxito."
            });

            this.submit();

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

    $('#nombre').on('change', function () {
        (validarNombre()) ? (eliminarError()): (mostrarError());
        console.log('aqui estoy');
    });

    $('#apellidos').on('change', function () {
        (validarApellidos()) ? (eliminarError()): (mostrarError());
    });

    $('#genero').on('change', function () {
        (validarGenero()) ? (eliminarError()): (mostrarError());
    });

    $('#fecha_nacimiento').on('change', function () {
        (validarFechaNacimiento()) ? (eliminarError()): (mostrarError());
    });

    $('#direccion').on('change', function () {
        (validarDireccion()) ? (eliminarError()): (mostrarError());
    });

    $('#telefono').on('change', function () {
        (validarTelefono()) ? (eliminarError()): (mostrarError());
    });

    $('#email').on('change', function () {
        (validarEmail()) ? (eliminarError()): (mostrarError());
    });

    $('#password').on('change', function () {
        (validarPassword()) ? (eliminarError()): (mostrarError());
    });

    $('#password_confirmation').on('change', function () {
        (validarPasswordConfirmation()) ? (eliminarError()): (mostrarError());
    });

});