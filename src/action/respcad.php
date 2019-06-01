<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            require_once '../class/professorDAO.php';
            $conta = new professor();
            $conta->nome = $_POST['nome'];
            $conta->email = $_POST['email'];
            $conta->senha = $_POST['senha'];

            $banco = new professorDAO();
            if(!$banco->inserir($conta)){
                header("Location: ../view/cadastar.html");
            }else{
                header("Location: ../view/configuracao.html");
            }
        ?>
    </body>
</html>