<?php

class Vendedor {
    public $nome;
    public $ra;
    public $telefone;
    public $carro;

    public function __construct($nome, $ra, $telefone, $carro) {
        $this->nome = $nome;
        $this->ra = $ra;
        $this->telefone = $telefone;
        $this->carro = $carro;
    }

    public function anunciarVenda() {
        return "O vendedor $this->nome está anunciando um {$this->carro->modelo}.\n . <br>";
    }
}