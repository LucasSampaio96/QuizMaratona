<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <?php
        require_once '../class/professorDao.php';
        session_start();
        $conta = new professor();
        $conta->email = $_POST['email'];
        $conta->senha = $_POST['senha'];

        $banco = new professorDAO();
        if (!$banco->consultar($conta)) {
            echo '<h1>Dados Incorretos</h1>';
            header("Location: ../view/login.html");
        } else {
            echo '<h1>Bem Vindo!</h1>';
           header("Location: ../view/configuracao.html");
        }

    ?>
    </body>
</html>