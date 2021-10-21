

import * as uteis from "./uteis.js";



export function show(){
    console.log("lancar registro show");
    var corpo = $("#lancarRegistro");

    uteis.ocultarBody()
    corpo.show();
}