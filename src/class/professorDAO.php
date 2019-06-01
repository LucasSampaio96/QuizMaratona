<?php

    require_once 'DataSource.php';
    require_once 'professor.php';

    class professorDAO{

        private $conexao;

        function __construct() {
            $this->conexao = new DataSource("db_maratona");
        }

        function __destruct(){
            $this->conexao = null;
        }

        function inserir($obj){
            $sql = "INSERT INTO tb_professor(nome, email, senha) VALUE (?, ?, ?)";
            $nome = $obj->nome;
            $email = $obj->email;
            $senha = $obj->senha;

            $stm = mysqli_prepare($this->conexao->con, $sql);
            if (!$stm) {
                die('Falha na construcao SQL');
            }

            if (!$stm->bind_param("sss", $nome,$email, $senha)) {
                die('Falha na atribuicao de valores');
            }

            return $stm->execute();
        }

        function remove($obj){

            $sql = "DELETE FROM tb_professor WHERE email=? AND senha=?";
            $email = $obj->email;
            $senha = $obj->senha;

            $stm = mysqli_prepare($this->conexao->con, $sql);
            if (!$stm) {
                die("Falha na construcao SQL");
            }

            if (!$stm->bind_param("ss", $email, $senha)) {
                die('Falha na atribuicao de valores');
            }

            return $stm->execute();
        }

        function atualizar($obj, $novo){
            $sql = "UPDATE tb_professor SET senha=? WHERE email=? AND senha=?";
            $email = $obj->email;
            $senha = $obj->senha;

            $stm = mysqli_prepare($this->conexao->con, $sql);
            if (!$stm) {
                die("Falha na construcao SQL");
            }

            if (!$stm->bind_param("sss",$novo, $email, $senha)) {
                die('Falha na atribuicao de valores');
            }

            return $stm->execute();
        }

        function consultar($obj) {
            $sql = "SELECT * FROM tb_professor WHERE email=? AND senha=?";
            $email = $obj->email;
            $senha = $obj->senha;

            $stm = mysqli_prepare($this->conexao->con, $sql);
            if (!$stm) {
                die('Falha na construcao SQL');
            }

            if (!$stm->bind_param("ss", $email, $senha)) {
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
            $sql = "SELECT * FROM tb_professor";

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
                    $obj->email->$row['email'];
                    $obj->senha->$row['senha'];
                    array_push($vet, $obj);
                }
            }
            return $vet;
        }

        function inserirPergunta(questao $questao){
            $sql = "SELECT * FROM tb_questao WHERE id_questao=? ";



        }

    }