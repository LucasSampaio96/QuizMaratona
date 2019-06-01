<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            require_once '../class/alunoDAO.php';
            $conta = new aluno();
            $conta->nome = $_POST['nome'];
            $conta->id_sala = $_POST['id_sala'];

            $banco = new alunoDAO();
            if(!$banco->listar($conta)){
                echo '<h1>Dados Incorretos!</h1>';
            }else{
                echo '<h1>Dados Gravados</h1>';
            }
        ?>
    </body>
</html>