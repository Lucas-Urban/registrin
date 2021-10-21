import * as uteis from "./uteis.js";


export function show(){
    console.log("gerenciar usuario show");
    var corpo = $("#gerenciarUsuario");

    uteis.ocultarBody()
    corpo.show();
}