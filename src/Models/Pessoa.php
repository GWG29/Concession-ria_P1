<?php 
namespace Models;

abstract class Pessoa {
    public string $nome;
    public string $cpf;
    public string $telefone;

    public function __construct($nome, $cpf, $telefone) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
    }
}