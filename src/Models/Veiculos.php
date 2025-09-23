<?php
namespace Models;
use Models\Carro;

class SUV extends Carro {
    public $tracao;
    public $OffRoad;

    public function __construct($marca, $modelo, $ano, $cor, $preco, $origem, $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas, $tracao = "", $OffRoad = false) {
        parent::__construct($marca, $modelo, $ano, $cor, $preco, $origem, $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas);
        $this->tracao = $tracao;
        $this->OffRoad = $OffRoad;
    }
}

class Sedan extends Carro {
    public $luxo;
    public $conforto;

    public function __construct($marca, $modelo, $ano, $cor, $preco, $origem, $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas, $luxo = "", $conforto = "") {
        parent::__construct($marca, $modelo, $ano, $cor, $preco, $origem, $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas);
        $this->luxo = $luxo;
        $this->conforto = $conforto;   
    }
}

class Caminhonete extends Carro {
    public $capacidadeCarga;
    public $tipoCabine;

    public function __construct($marca, $modelo, $ano, $cor, $preco, $origem, $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas, $capacidadeCarga = 0, $tipoCabine = "") {
        parent::__construct($marca, $modelo, $ano, $cor, $preco, $origem, $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas);
        $this->capacidadeCarga = $capacidadeCarga;
        $this->tipoCabine = $tipoCabine;
    }
}