function validarSeleccion() {
    var radio = document.getElementsByName('rol');
    var seleccionado = false;

    for (var i = 0; i < radio.length; i++) {
        if (radio[i].checked) {
            seleccionado = true;
            break;
        }
    }

    return seleccionado;
}

$(document).ready(function () {

    $('#componente_rol').show();
    $('#formulario_registro').hide();

    $('#rol_seleccionado').click(function () {

        if(validarSeleccion() === false){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
            });
            Toast.fire({
                icon: "error",
                title: "No se ha seleccionado ningún rol. Por favor, seleccione un rol para continuar."
            });

        } else {
            $('#formulario_registro').show();
            $('#componente_rol').hide();
        }
    });

    $('#btn_regresar').click(function () {
        $('#formulario_registro').hide();
        $('#componente_rol').show();
    });

    $('#contenedor_demandante').click(function () {
        $('#contenedor_demandante').addClass('rol_seleccionado');
        if ($('#contenedor_seleccionador').hasClass('rol_seleccionado')) {
            $('#contenedor_seleccionador').removeClass('rol_seleccionado');
        }
    });

    $('#contenedor_seleccionador').click(function () {
        $('#contenedor_seleccionador').addClass('rol_seleccionado');
        if ($('#contenedor_demandante').hasClass('rol_seleccionado')) {
            $('#contenedor_demandante').removeClass('rol_seleccionado');
        }
    });

});