<?php
namespace Models;
use Models\Carro;

class SUV extends Carro {
    public $tracao;
    public $OffRoad;

    public function __construct($modelo, $cor, $ano) {
        parent::__construct($modelo,$ano,$cor);
    }
}

class Sedan extends Carro {
    public $luxo;
    public $conforto;

    public function __construct($modelo, $cor, $ano) {
        parent::__construct($modelo,$ano,$cor);
    }
}

class Caminhonete extends Carro {
    public $capacidadeCarga;
    public $tipoCabine;

    public function __construct($modelo, $cor, $ano) {
        parent::__construct($modelo,$ano,$cor);
    }
}