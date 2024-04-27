let enlacePublicarOferta = document.getElementById("enlace_publicar_oferta");

if (enlacePublicarOferta){
    enlacePublicarOferta.addEventListener("mouseover", function (){
        localStorage.setItem("pagina_impresa", "publicar_proceso");
    });
}


let enlaceGestionarProcesos = document.getElementById("enlace_gestionar_procesos");

if (enlaceGestionarProcesos){
    enlaceGestionarProcesos.addEventListener("mouseover", function (){
        localStorage.setItem("pagina_impresa", "gestionar_procesos");
    });
}
