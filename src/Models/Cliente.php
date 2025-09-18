<?php

namespace Models;

use src\Models\Pessoa;

class Clientes extends Pessoa{
    public string $modeloComprado;
    public string $corCarro;
    public string $modoPagamento;
    public string $Seguro;
    public bool $querSeguro;

    public function __construct($modeloComprado, $corCarro,$modoPagamento,$Seguro){
        parent::__construct($nome,$idade,$cpf,$rg,$endereco);
        $this->modeloComprado = $modeloComprado;
        $this->corCarro = $corCarro;
        $this->modoPagamento = $modoPagamento;
        $this->Seguro = $Seguro;
        strtolower($this->Seguro) === 'sim' ? $this->querSeguro = true : $this->querSeguro = false;
        // defini como true naturalmente, porém a pessoa vai poder alterar esse valor na compra
        // entretanto acho que é válido considerar como positivo o fato de querer seguro.

        
    }

    public function getModelo($modeloComprado){
        $this->modeloComprado = $modeloComprado;
    }

    public function getCor($corCarro){
        $this->corCarro = $corCarro;
    }

    public function getModoPagamento($modoPagamento){
        $this->getModoPagamento = $modoPagamento;
    }

    public function getSeguro($querSeguro){
        $this->querSeguro = $querSeguro;
    }
}