<!DOCTYPE html>
<hmtl>
    <head>
        <title>resposta</title>
    </head>
    <body>
        <?php
            require_once '../class/questaoDAO.php.php';
            $conta = new questao();
            $conta->descricao = $_POST['descricao'];
            $conta->alternativaA = $_POST['alternartivaA'];
            $conta->alternativaB = $_POST['alternartivaB'];
            $conta->alternativaC = $_POST['alternartivaC'];
            $conta->alternativaD = $_POST['alternartivaD'];
            $conta->resposta = $_POST['resposta'];

            $resp = $_POST['resposta'];
            $banco = new questaoDAO();
            if (!$banco->consultar($conta)) {
                echo 'resp';
            } else {
                echo 'erro';
            }
        ?>
    </body>
</hmtl>


