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
        
    }

    public function setModelo($modeloComprado){
        $this->modeloComprado = $modeloComprado;
    }

    public function setCor($corCarro){
        $this->corCarro = $corCarro;
    }

    public function setModoPagamento($modoPagamento){
        $this->getModoPagamento = $modoPagamento;
    }

    public function setSeguro($querSeguro){
        $this->querSeguro = $querSeguro;
    }

    public function compraCliente($modoPagamento,$modeloComprado,$querSeguro,$entrada,$precoCarro,$valorSeguro){
        
    }
}