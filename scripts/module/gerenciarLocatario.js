import * as uteis from "./uteis.js";


export function show(){
    console.log("gerenciar locatario show");
    var corpo = $("#gerenciarLocatario");

    uteis.ocultarBody()
    corpo.show();
}