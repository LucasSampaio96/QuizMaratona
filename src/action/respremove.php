<!DOCTYPE html>
<html>
    <head lang="PT-BR">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
        require_once '../class/professorDAO.php';

        $conta = new login();
        $conta->email = $_POST['email'];
        $conta->senha = $_POST['senha'];

        $banco = new professorDAO();
        if(!$banco->remover($conta)) {
            echo '<h1>Falha no Cancelamento</h1>';
        } else {
            echo '<h1>Conta Cancelada</h1>';
        }

    ?>
    </body>
</html>