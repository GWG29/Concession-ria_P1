<?php

namespace Models;
use Models\Veiculo;

class Carro extends Veiculo {
    public $modelo;
    public $cor;
    public $ano;

    public function __construct($modelo, $cor, $ano) {
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->ano = $ano;
    }
}