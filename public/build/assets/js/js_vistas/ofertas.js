$(document).ready(function() {
    let barra = document.querySelector('.barra');
    let boton = document.getElementById('boton');
    let valor = document.getElementById('valor');
    let valorInterno = parseInt(extraerParametros(location.href).experiencia); // Valor inaccesible por el usuario
    console.log(valorInterno);

    let deslizando = false;
    let seHaDeslizado = false;

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
            seHaDeslizado = true;
        }
    });

    document.addEventListener('mouseup', () => {
        deslizando = false;
    });

    function creaOActualizaInputExperiencia(){
        if ($("input[name='experiencia']").length == 0){
            console.log("Hola");
            let inputExperiencia = document.createElement("input");
            inputExperiencia.type = "number";
            inputExperiencia.name = "experiencia";
            inputExperiencia.value = valorInterno;
            inputExperiencia.style.opacity = 0;

            let formulario = document.getElementsByTagName("form");
            formulario[0].appendChild(inputExperiencia);
        }else{
            let parametrosUrl = extraerParametros(location.href);
            $("input[name='experiencia']").val(parametrosUrl.experiencia);
        }
    }


    function anhadeValorExperienciaEnEnvio(){
        $("#boton_envio_formulario").on("mousedown", function(){
            creaOActualizaInputExperiencia();
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

                creaOActualizaInputExperiencia();
            });
        });
    };


    function extraerParametros(url) {
        let urlObj = new URL(url);
        let queryString = urlObj.search;

        if (!queryString) {
            return {};
        }

        let params = new URLSearchParams(queryString);
        let parametros = {};

        params.forEach(function(value, key) {
            if (parametros.hasOwnProperty(key)) {
                if (!Array.isArray(parametros[key])) {
                    parametros[key] = [parametros[key]];
                }
                parametros[key].push(value);
            } else {
                parametros[key] = value;
            }
        });

        return parametros;
    }

    anhadeValorExperienciaEnEnvio();
    aplicaEventoBotonPaginacion();
});
