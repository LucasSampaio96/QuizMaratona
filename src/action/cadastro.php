<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
        <body>
        <?php
            require_once '../class/professorDAO.php';
            $conta = new login();
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['txtsenha'];

            $conta = new professorDAO();
            if(!$banco->inserir($conta)){
                echo 'Falha na Gravação';
            }else{
                echo '<h1>Dados Gravados com Sucesso!</h1>';
            }
        ?>
    </body>
</html>
