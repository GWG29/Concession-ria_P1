<?php

namespace Models;

abstract class Carro{
    public string $marca;
    public string $modelo;
    public int $ano;
    public string $cor;
    public float $preco;
    public string $origem;
    public bool $ehUsado;
    public int $kmRodados;
    public int $kmLitro;
    public bool $ehAutomatico;
    public string $combustivel;
    public string $status;
    public int $portas;
    
    public function __construct($marca, $modelo, $ano, $cor, $preco, $origem, $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas) {
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->ano = $ano;
        $this->marca = $marca;
        $this->preco = $preco;
        $this->origem = $origem;
        $this->ehUsado = $ehUsado;
        $this->kmRodados = $km;
        $this->ehAutomatico = $ehAutomatico;
        $this->combustivel = $combustivel;
        $this->portas = $portas;
        $this->status = $status;
    }
}