<?php
namespace Models;
use Models\Carro;

class SUV extends Carro {
    public $tracao;
    public $OffRoad;

    public function __construct($modelo, $cor, $ano) {
        parent::__construct($modelo,$cor,$ano);
        $this->tracao = $tracao;
        $this->OffRoad = $OffRoad;
    }
}

class Sedan extends Carro {
    public $luxo;
    public $conforto;

    public function __construct($modelo, $cor, $ano) {
        parent::__construct($modelo,$cor,$ano);
        $this->luxo = $luxo;
        $this->conforto = $conforto;   
    }
}

class Caminhonete extends Carro {
    public $capacidadeCarga;
    public $tipoCabine;

    public function __construct($modelo, $cor, $ano) {
        parent::__construct($modelo,$cor,$ano);
        $this->capacidadeCarga = $capacidadeCarga;
        $this->tipoCabine = $tipoCabine;
    }
}