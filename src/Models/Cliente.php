<?php

namespace Models;

use Models\Pessoa;

class Cliente extends Pessoa{
    public string $modeloComprado;
    public string $corCarro;
    public string $modoPagamento;
    public string $Seguro;
    public bool $querSeguro;

    public function __construct($nome = "", $idade = 0, $cpf = "", $rg = "", $endereco = "", $modeloComprado = "", $corCarro = "", $modoPagamento = "", $Seguro = ""){
        parent::__construct($nome, "", $idade, $cpf, $rg, $endereco);
        $this->modeloComprado = $modeloComprado;
        $this->corCarro = $corCarro;
        $this->modoPagamento = $modoPagamento;
        $this->Seguro = $Seguro;
        $this->querSeguro = strtolower($this->Seguro) === 'sim';
        
    }

    public function getModelo(): string {
        return $this->modeloComprado;
    }

    public function setModelo(string $modeloComprado): void {
        $this->modeloComprado = $modeloComprado;
    }

    public function getCor(): string {
        return $this->corCarro;
    }

    public function setCor(string $corCarro): void {
        $this->corCarro = $corCarro;
    }

    public function getModoPagamento(): string {
        return $this->modoPagamento;
    }

    public function setModoPagamento(string $modoPagamento): void {
        $this->modoPagamento = $modoPagamento;
    }

    public function getSeguro(): string {
        return $this->Seguro;
    }

    public function getQuerSeguro(): bool {
        return $this->querSeguro;
    }

    public function setQuerSeguro(bool $querSeguro): void {
        $this->querSeguro = $querSeguro;
    }


    public function compraCliente($modoPagamento,$modeloComprado,$querSeguro,$entrada,$precoCarro,$valorSeguro,$numParcelas = 1): array{
        $this->modoPagamento = $modoPagamento;
        $this->modeloComprado = $modeloComprado;
        $this->querSeguro = $querSeguro;

        $valorTotal = $precoCarro;
        if ($this->querSeguro){
            $valorTotal += $valorSeguro;
        }

        $valorRestante = $valorTotal - $entrada;
        $juros = 0.0; // Inicializar a variável

        if(strtolower($modoPagamento) == "a vista"){
            // coloquei um desconto de 5% se pagar a vista :P
            $valorRestante = $valorRestante * 0.95;
        }
        else if(strtolower($modoPagamento) == "parcelado"){
            switch($numParcelas){
               case 1:
                $juros = 0.0; 
                break;
            case 2:
                $juros = 0.02; 
                break;
            case 3:
                $juros = 0.04; 
                break;
            case 4:
                $juros = 0.06; 
                break;
            case 5:
                $juros = 0.08; 
                break;
            case 6:
                $juros = 0.10; 
                break;
            default:
                
                $juros = 0.12;
                break;
            }
        }

        $valorRestante *= (1 + $juros);

        $valorParcelas = $valorRestante / $numParcelas;


        return [
            'total' => $valorRestante,
            'parcelas'=> $numParcelas,
            'valorParcelas'=> $valorParcelas
        ];
    }

    protected function cadastroCliente(){
        
    }
}