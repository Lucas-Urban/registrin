import * as lancarRegistro from "./module/lancarRegistro.js";
import * as consultarRegistro from "./module/consultarRegistro.js";
import * as gerenciarUsuario from "./module/gerenciarUsuario.js";


import * as uteis from "./module/uteis.js";


$(document).ready(function(){
    uteis.ocultarBody();


    $("#btnConsultarRegistro").click(function (e) { 
        consultarRegistro.show();
    });

    $("#btnLancarRegistro").click(function (e) { 
        lancarRegistro.show();
    });

    $("#btnGerenciarUsuario").click(function (e) { 
        gerenciarUsuario.show();
    });
});
