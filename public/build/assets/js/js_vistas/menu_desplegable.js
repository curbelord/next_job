let botonMenu = document.getElementById("boton_menu");


if (botonMenu){
    botonMenu.addEventListener("click", function (){
        let containerListaMenu = document.getElementById("container_lista_menu");
        let listaMenu = document.getElementById("lista_menu");

        if (listaMenu.style.right == "0px") {
            listaMenu.style.transition = "right 1s";
            listaMenu.style.right = "-318px";
            setTimeout(function() {
                containerListaMenu.style.overflow = "hidden";
            }, 500);
        } else {
            containerListaMenu.style.overflow = "visible";
            listaMenu.style.transition = "right 500ms";
            listaMenu.style.right = "0px";
        }
    });

}
