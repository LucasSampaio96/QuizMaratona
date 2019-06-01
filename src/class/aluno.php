<?php


class aluno{

    private $id_aluno;
    private $nome;
    private $pontuacao;
    private $id_sala;

    function __get($name){
        switch ($name){
            case 'id_aluno':
                return $this->id_aluno;
            case 'nome':
                return $this->nome;
            case 'pontuacao':
                return $this->pontuacao;
        }
    }

    function __set($atibuto, $valor){
        switch ($atibuto) {
            case 'id_aluno':
                return $this->id_aluno = $valor;
            case 'nome':
                return $this->nome = $valor;
            case 'pontuacao':
                return $this->pontuacao = $valor;

        }
    }
}