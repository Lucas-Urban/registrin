
export function ocultarBody(){
    console.log("ocultarBody");

    $(".corpoHtml").hide();
}

export function alertModal(msg) {
    $("#msgAlerta").html(msg);
    $("#modalAlerta").modal({ backdrop: "static" });
  }