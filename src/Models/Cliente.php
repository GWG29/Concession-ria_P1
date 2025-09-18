<?php

namespace Models;

use src\Models\Pessoa;

class Clientes extends Pessoa{
    public string $modeloComprado;
    public string $corCarro;
    public string $modoPagamento;
    public bool $querSeguro;

    public function __construct($modeloComprado, $corCarro,$modoPagamento,$querSeguro){
        parent::__construct($nome,$idade,$cpf,$rg,$endereco);
        $this->modeloComprado = $modeloComprado;
        $this->corCarro = $corCarro;
        $this->modoPagamento = $modoPagamento;
        // defini como true naturalmente, porém a pessoa vai poder alterar esse valor na compra
        // entretanto acho que é válido considerar como positivo o fato de querer seguro.
        $this->querSeguro = true;
    }


}