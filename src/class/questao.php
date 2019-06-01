<?php


class questao{

    private $id_questao;
    private $descricao;
    private $alternativaA;
    private $alternativaB;
    private $alternativaC;
    private $alternativaD;
    private $resposta;

    function __get($name){
        switch ($name){
            case 'id_questao':
                return $this->id_questao;
            case 'descricao':
                return $this->descricao;
            case 'alternativaA':
                return $this->aleternativaA;
            case 'alternativaB':
                return $this->aleternativaB;
            case 'alternativaC':
                return $this->aleternativaC;
            case 'alternativaD':
                return $this->aleternativaD;
            case 'resposta':
                return $this->resposta;
        }
    }

    function __set($atibuto, $valor){
        switch ($atibuto) {
            case 'id_questao':
                return $this->id_questao = $valor;
            case 'descricao':
                return $this->descricao = $valor;
            case 'alternativaA':
                return $this->aleternativaA = $valor;
            case 'alternativaB':
                return $this->aleternativaB = $valor;
            case 'alternativaC':
                return $this->aleternativaC = $valor;
            case 'alternativaD':
                return $this->aleternativaD = $valor;
            case 'resposta':
                return $this->resposta = $valor;
        }
    }



}