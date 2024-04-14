$(document).ready(function() {
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

    aplicaEventoBotonPaginacion();
});
