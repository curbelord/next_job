$(document).ready(function() {
    function aplicaEventoBotonPaginacion (){
        $(".elemento_numeracion_slider").each(function (indice){
            $(this).on("mousedown", function (event){
                let inputNumeracion = $("<input>", {type: "text", name: "pagina", value: indice + 1, style: "opacity: 0;"});

                let inputFiltro = $("<input>", {type: "text", name: "buscador", style: "opacity: 0;"});
                let queryString = window.location.search;
                let urlParams = new URLSearchParams(queryString);

                if (urlParams.has('buscador')) {
                    let buscadorValue = urlParams.getAll('buscador')[0];
                    inputFiltro.val(buscadorValue);
                }

                let formulario = $("form");
                formulario.append(inputFiltro);
                formulario.append(inputNumeracion);

                console.log(inputFiltro.val());
            });
        });
    };

    aplicaEventoBotonPaginacion();
});
