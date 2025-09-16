<?php

namespace Models;

class Carro{
    public $marca;
    public $modelo;
    public $ano;
    public $cor;
    public $preco;
    public $origem;
    public bool $ehUsado;
    public $kmRodados;
    public $kmLitro;
    public bool $ehAutomatico;
    public $combustivel;
    public $status;
    public $portas;
    public $conducao;
    
    public function __construct($marca, $modelo, $ano, $cor, $preco, $origem, $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas, $conducao) {
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->ano = $ano;
        $this->marca = $marca;
        $this->preco = $preco;
        $this->origem = $origem;
        $this->ehUsado = $ehUsado;
        $this->km = $km;
        $this->ehAutomatico = $ehAutomatico;
        $this->combustivel = $combustivel;
        $this->portas = $portas;
        $this->status = $status;
        $this->conducao = $conducao;
    }
}