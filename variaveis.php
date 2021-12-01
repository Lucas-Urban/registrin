<?php
    @session_start();

    $_SESSION['menu'] = $Menus = [
        ['GerenciarUsuarios', 'Gerenciar Usuários'],
        ['ConsultarUsuarios', 'Consultar Usuários'],
        ['GerenciarLocatarios', 'Gerenciar Locatários'],
        ['ConsultarLocatarios', 'Consultar Locatários'],
        ['ConsultarRegistros', 'Consultar Registros'],
        ['LancarRegistros', 'Lançar Registros']
    ];
?>