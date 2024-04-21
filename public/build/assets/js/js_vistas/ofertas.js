$(document).ready(function() {
    let barra = document.querySelector('.barra');
    let boton = document.getElementById('boton');
    let valor = document.getElementById('valor');
    let valorInterno = 0; // Valor inaccesible por el usuario

    let deslizando = false;

    boton.addEventListener('mousedown', e => {
        deslizando = true;
    });

    document.addEventListener('mousemove', e => {
        if (deslizando) {
            let posX = e.clientX - barra.getBoundingClientRect().left;
            if (posX < 0){
                posX = 0;
            }

            if (posX > barra.offsetWidth){
                posX = barra.offsetWidth;
            }

            boton.style.left = `${posX}px`;

            let porcentaje = (posX / barra.offsetWidth) * 10;
            valor.textContent = `${Math.round(porcentaje)} años`;
            valorInterno = Math.round(porcentaje);
        }
    });

    document.addEventListener('mouseup', () => {
        deslizando = false;
    });

    function creaInputExperiencia(){
        let inputExperiencia = document.createElement("input");
        inputExperiencia.type = "number";
        inputExperiencia.name = "experiencia";
        inputExperiencia.value = valorInterno;
        inputExperiencia.style.opacity = 0;

        let formulario = document.getElementsByTagName("form");
        formulario[0].appendChild(inputExperiencia);
    }


    function anhadeValorExperienciaEnEnvio(){
        $("#boton_envio_formulario").on("mousedown", function(){
            creaInputExperiencia();
        });
    }


    function aplicaEventoBotonPaginacion (){
        $(".elemento_numeracion_slider").each(function (indice){
            $(this).on("mousedown", function (event){
                let inputNumeracion = document.createElement("input");
                inputNumeracion.type = "text";
                inputNumeracion.name = "pagina";
                inputNumeracion.value = indice + 1;
                inputNumeracion.style.opacity = 0;

                let formulario = document.getElementsByTagName("form");
                formulario[0].appendChild(inputNumeracion);
            });
        });
    };


    anhadeValorExperienciaEnEnvio();

    anhadeValorExperienciaEnEnvio();
    aplicaEventoBotonPaginacion();
});
