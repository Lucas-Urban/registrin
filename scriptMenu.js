const menu = ["GerenciarUsuarios", "ConsultarUsuarios", "GerenciarLocatarios", "ConsultarLocatarios", "ConsultarRegistros", "LancarRegistros"]

function abrePagina(pagina){
    menu.forEach(element => {
        let selection = document.getElementById(element);
        if (selection){
            selection.style.display = "none";
        }
    });
    if (menu.includes(pagina)){
        document.getElementById(pagina).style.display = "";
    };
}