$(document).ready(function () {

    $('#btn_registrar').click(function () {
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var password_confirmation = $('#password_confirmation').val();
        var rol = $("input[name='rol']:checked").val();

        if (nombre === '' || apellido === '' || email === '' || password === '' || password_confirmation === '' || rol === undefined) {
            alert('Todos los campos son obligatorios. Por favor, complete todos los campos.');
        } else {
            $.ajax({
                type: 'POST',
                url: '/registro/validar',
                data: {
                    nombre: nombre,
                    apellido: apellido,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                    rol: rol
                },
                success: function (response) {
                    if (response === 'success') {
                        $('#formulario_registro').hide();
                        $('#componente_rol').hide();
                        $('#componente_registro_exitoso').show();
                    } else {
                        alert(response);
                    }
                }
            });
        }
    });
});