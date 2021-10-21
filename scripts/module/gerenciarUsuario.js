import * as uteis from "./uteis.js";

const url = ''
  
export function show() {
    console.log('$("#bntCadastrarUsuario").click()');
  
    var corpo = $("#gerenciarUsuario");

    uteis.ocultarBody();
    $("#modalCadastrarUsuario").hide();
    corpo.show();
  
    $("#conteudoTabelaCadastrarUsuario").html("");
    /*$.ajax({
    url: url,
      type: "POST",
      data: { acao: "carregarTabelaCadastrarUsuario" },
      success: function (result) {
        console.log(result);
  
        var objeto = JSON.parse(result);
        var conteudo = "";
  
        if (objeto.length > 0) {
          for (var i = 0; i < objeto.length; i++) {
            conteudo +=
              '<tr id="linhaTabelaCadastrarUsuario' +
              i +
              '">\n\
                          <td data-title="ID" value="' +
              objeto[i]["id"] +
              '" >' +
              objeto[i]["id"] +
              '</td>\n\
                          <td data-title="Nome">' +
              objeto[i]["nome"] +
              '</td>\n\
                          <td data-title="Email">' +
              objeto[i]["email"] +
              '</td>\n\
                          <td data-title="Admin">' +
              objeto[i]["admin"] +
              '</td>\n\
                          <td><a href="#" class="excluirUsuario">Excluir</a></td>\n\
                       </tr>';
          }
  
          $("#conteudoTabelaCadastrarUsuario").append(conteudo);
  
          $(".excluirUsuario").bind("click", excluirUsuario);
        } else {
          //$(".conteudoTabelaCadastrarUsuario").hide();
        }
      },
    });*/
}
  
export function modalCadastrarUsuarioBntRegistrarClick() {
    console.log('$("#modalCadastrarUsuarioBntRegistrar").click()');
  
    var email = $("#cadastrarUsuarioEmail").val();
    var nome = $("#cadastrarUsuarioNome").val();
    var senha = $("#cadastrarUsuarioSenha").val();
    var senhaRepetida = $("#cadastrarUsuarioSenhaRepetida").val();
  
    if (nome == "") {
      uteis.alertModal("Informe o nome do usuário");
      return;
    }
  
    if (email == "") {
      uteis.alertModal("Informe o Email");
      return;
    }
  
    if (senha == "") {
      uteis.alertModal("Informe a senha do usuário");
      return;
    }
  
    if (senha != senhaRepetida) {
      uteis.alertModal("Senhas diferem");
      return;
    }
  
    $.ajax({
      url: url,
      type: "POST",
      data: { acao: "cadastrarUsuario", nome: nome, email: email, senha: senha },
      success: function (result) {
        console.log(result);
  
        if (result == "EMAIL EM USO") {
          uteis.alertModal("O Email informado já está em uso");
        } else {
          bntCadastrarUsuarioClick();
          $("#modalCadastrarUsuario").hide();
        }
      },
      error: function () {
        console.log("Erro ao cadastrar usuário " + nome);
      },
    });
}

export function bntabrirModalCadastrarUsuarioClick() {
    console.log('$("#bntabrirModalCadastrarUsuario").click()');
  
    $("#cadastrarUsuarioEmail").val("");
    $("#cadastrarUsuarioNome").val("");
    $("#cadastrarUsuarioSenha").val("");
    $("#cadastrarUsuarioSenhaRepetida").val("");
  
    $("#modalCadastrarUsuario").show();
}
  
export function excluirUsuario() {
    var linha = $(this).parent().parent(); //tr
    var tdID = linha.children("td:nth-child(1)");
  
    var id = tdID.text();
  
    console.log("excluirUsuario " + id);
  
    $.ajax({
      url: url,
      type: "POST",
      data: { acao: "excluirUsuario", id: id },
      success: function (result) {
        console.log(result);
        bntCadastrarUsuarioClick();
      },
      error: function () {
        console.log("Erro ao excluir o usuário " + id);
      },
    });
}
  