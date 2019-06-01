<?php

    require_once 'DataSource.php';
    require_once 'questao.php';

class questaoDAO{

    private $conexao;

    function __construct() {
        $this->conexao = new DataSource("quiz_maratona");
    }

    function __destruct() {
        $this->link = NULL;
    }

    function inserir($obj) {
        $sql = "INSERT INTO db_maratona`.`tb_questao` (`questao`, `resposta`); VALUES (?, ?)";
        $descricao = $obj->descricao;
        $resposta = $obj->resposta;

        $stm = mysqli_prepare($this->conexao->con, $sql);
        if (!$stm) {
            die('Falha na construcao SQL');
        }

        if (!$stm->bind_param("ss",  $descricao, $resposta)) {
            die('Falha na atribuicao de valores');
        }

        return $stm->execute();
    }

    function remover($obj) {
        $sql = "DELETE FROM tb_questao WHERE descricao=? AND id_questao=? AND resposta=?";
        $id_questao = $obj->id_questao;
        $descricao = $obj->descricao;
        $resposta = $obj->resposta;

        $stm = mysqli_prepare($this->conexao->con, $sql);
        if (!$stm) {
            die('Falha na construcao SQL');
        }

        if (!$stm->bind_param("sss", $id_questao, $descricao, $resposta)) {
            die('Falha na atribuicao de valores');
        }

        return $stm->execute();
    }

    function atualizar($obj, $novo) {
        $sql = "UPDATE tb_questao SET descricao=? WHERE id_questao=? AND descricao=?";
        $id_questao = $obj->id_questao;
        $descricao = $obj->descricao;
        $resposta = $obj->resposta;

        $stm = mysqli_prepare($this->conexao->con, $sql);
        if (!$stm) {
            die('Falha na construcao SQL');
        }

        if (!$stm->bind_param("sss", $id_questao, $descricao, $resposta)) {
            die('Falha na atribuicao de valores');
        }

        return $stm->execute();
    }

    function consultar($obj) {
        $sql = "SELECT * FROM tb_questao WHERE id_questao=? AND descricao=? AND resposta=?";
        $id_questao = $obj->id_questao;
        $descricao = $obj->descricao;
        $resposta = $obj->resposta;

        $stm = mysqli_prepare($this->conexao->con, $sql);
        if (!$stm) {
            die('Falha na construcao SQL');
        }

        if (!$stm->bind_param("sss", $id_questao, $descricao, $resposta)) {
            die('Falha na atribuicao de valores');
        }

        if (!$stm->execute()) {
            die('Falha na execucao SQL');
        }

        $result = $stm->get_result();
        if ($result->num_rows === 0) {
            return false;
        } else {
            return true;
        }
    }

    function listar() {
        $sql = "SELECT * FROM tb_questao";

        $stm = mysqli_prepare($this->conexao->con, $sql);
        if (!$stm) {
            die('Falha na construcao SQL');
        }

        if (!$stm->execute()) {
            die('Falha na execucao SQL');
        }

        $vet = array();
        $result = $stm->get_result();
        if ($result->num_rows === 0) {
            return false;
        } else {
            while ($row = $result->fetch_assoc()) {
                $obj = new questao();
                $obj->id_questao = $row['id_questao'];
                $obj->descricao = $row['descricao'];
                $obj->resposta = $row['resposta'];
                array_push($vet, $obj);
            }
        }
        return $vet;
    }

    function pontuacao($respondido){
        $sql = "SELECT * FROM tb_questao WHERE resposta LIKE repondido=?";

        if (__get() === $respondido){
            $ponto = +3;
            $this->pontuacao(ponto);
        } else{
            $ponto = +1;
            $this->pontuacao(ponto);
        }
        return $ponto;
    }
}