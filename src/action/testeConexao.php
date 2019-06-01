<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../class/DataSource.php';

        $conexao = new DataSource('quizmaratona');
        echo '<h1>Conexao efetuada</h1>';
        $conexao = NULL;
        echo 'Fim da conexao';
        ?>
    </body>
</html>