import * as uteis from "./uteis.js";


export function show(){
    console.log("consultar registro show");
    var corpo = $("#consultarRegistro");

    uteis.ocultarBody()
    corpo.show();
}