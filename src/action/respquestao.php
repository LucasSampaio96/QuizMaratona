<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            require_once '../class/questaoDAO.php';
            $conta = new questao();
            $conta->descricao = $_POST['descricao'];
            $conta->alternativaA = $_POST['alternartivaA'];
            $conta->alternativaB = $_POST['alternartivaB'];
            $conta->alternativaC = $_POST['alternartivaC'];
            $conta->alternativaD = $_POST['alternartivaD'];
            $conta->resposta = $_POST['resposta'];

            $banco = new questaoDAO();
            if(!$banco->inserir($conta)){
                echo 'Falha na gravação!';
            }else{
                echo '<h1>Dados gravados com sucesso!';
            }
        ?>
    </body>
</html>