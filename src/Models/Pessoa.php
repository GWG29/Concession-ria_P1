<?php 
namespace Models;


class Pessoa {
    public string $nome;
    public string $sobrenome;
    public int $idade;
    private string $cpf;
    private string $rg;
    private string $endereco;

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function __construct($nome = "", $sobrenome = "", $idade = 0, $cpf = "", $rg = "", $endereco = "") {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->endereco = $endereco;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function getRg() {
        return $this->rg;
    }
    public function getEndereco() {
        return $this->endereco;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function setRg($rg) {
        $this->rg = $rg;
    }
    public function getNomeCompleto(){
        return $this->nome . " " . $this->sobrenome;
    }
}