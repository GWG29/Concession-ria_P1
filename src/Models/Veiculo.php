<?php
namespace Models;
use Models\carro;

class SUV extends Carro {
    public $tracao;
    public $OffRoad;

    public function __construct($modelo, $cor, $ano) {
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->ano = $ano;
    }
}

class Sedan extends Carro {
    public $luxo;
    public $conforto;

    public function __construct($modelo, $cor, $ano) {
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->ano = $ano;
    }
}