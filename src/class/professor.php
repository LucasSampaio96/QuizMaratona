<?php


class professor{

    private $id_professor;
    private $nome;
    private $email;
    private $senha;
    private $id_sala;
    private $id_questão;


    function __get($name){
        switch ($name){
            case 'id_professor':
                return $this->id_professor;
            case 'nome':
                return $this->nome;
            case 'email':
                return $this->email;
            case 'senha':
                return $this->senha;
            case 'id_sala':
                return $this->id_sala;
            case 'id_questao':
                return $this->id_questão;

        }
    }

    function __set($atibuto, $valor){
        switch ($atibuto) {
            case 'id_professor':
                return $this->id_professor = $valor;
            case 'nome':
                return $this->nome = $valor;
            case 'email':
                return $this->email = $valor;
            case 'senha':
                return $this->senha = $valor;
            case 'id_sala':
                return $this->id_sala = $valor;
            case 'id_questao':
                return $this->id_questão = $valor;
        }
    }
}