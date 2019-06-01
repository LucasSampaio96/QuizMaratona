<?php

    require_once 'DataSource.php';
    require_once 'aluno.php';

class alunoDAO{

    private $conexao;

    function __construct() {
        $this->conexao = new DataSource("quiz_maratona");
    }

    function __destruct(){
        $this->conexao = null;
    }

    function inserir($obj){
        $sql = "INSERT INTO tb_aluno(id_aluno, nome, pontuacao) VALUE (?, ?, ?)";
        $id_aluno = $obj->id_aluno;
        $nome = $obj->nome;
        $pontuacao = $obj->pontuacao;

        $stm = mysqli_prepare($this->conexao->con, $sql);
        if (!$stm) {
            die('Falha na construcao SQL');
        }

        if (!$stm->bind_param("sss", $id_aluno, $nome,$pontuacao)) {
            die('Falha na atribuicao de valores');
        }

        return $stm->execute();
    }

    function remove($obj){

        $sql = "DELETE FROM tb_aluno WHERE nome=? AND pontuacao=?";
        $nome = $obj->nome;
        $pontuacao = $obj->pontuacao;

        $stm = mysqli_prepare($this->conexao->con, $sql);
        if (!$stm) {
            die("Falha na construcao SQL");
        }

        if (!$stm->bind_param("ss", $nome, $pontuacao)) {
            die('Falha na atribuicao de valores');
        }

        return $stm->execute();
    }

    function atualizar($obj, $novo){
        $sql = "UPDATE tb_aluno SET nome=? WHERE pontuacao=? AND nome=?";
        $nome = $obj->nome;
        $pontuacao = $obj->pontuacao;

        $stm = mysqli_prepare($this->conexao->con, $sql);
        if (!$stm) {
            die("Falha na construcao SQL");
        }

        if (!$stm->bind_param("sss",$novo, $nome, $pontuacao)) {
            die('Falha na atribuicao de valores');
        }

        return $stm->execute();
    }

    function consultar($obj) {
        $sql = "SELECT * FROM tb_aluno WHERE nome=? AND pontuacao=?";
        $nome = $obj->nome;
        $pontuacao = $obj->pontuacao;

        $stm = mysqli_prepare($this->conexao->con, $sql);
        if (!$stm) {
            die('Falha na construcao SQL');
        }

        if (!$stm->bind_param("ss", $nome, $pontuacao)) {
            die('Falha na atribuicao de valores');
        }

        if (!$stm->execute()) {
            die('Falha na execucao SQL');
        }

        $result = $stm->get_result();
        if ($result->num_rows === 0){
            return false;
        }else{
            return true;
        }
    }

    function listar() {
        $sql = "SELECT * FROM tb_aluno";

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
                $obj = new login();
                $obj->nome->$row['nome'];
                $obj->pontuacao->$row['pontuacao'];
                array_push($vet, $obj);
            }
        }
        return $vet;
    }
}