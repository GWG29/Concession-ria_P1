<?php 
namespace Models;

class Pessoa {
    public string $nome;
    public int $idade;
    public string $cpf;
    public string $rg;
    public string $endereco;

    public function __construct($nome, $idade, $cpf, $rg, $endereco) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->endereco = $endereco;
    }
}