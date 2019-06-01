<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
        require_once '../class/professorDAO.php';
        $conta = new login();
        $conta->email = $_POST['email'];
        $conta->senha = $_POST['senha'];
        $nova = $_POST['confsenha'];

        $banco = new professorDAO();
        if(!$banco->atualizar($conta, $nova)) {
            echo '<h1>Falha na Atualizacao</h1>';
        } else {
            echo '<h1>Senha Atualizada</h1>';
        }

    ?>
    </body>
</html>