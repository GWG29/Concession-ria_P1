<?php

namespace Models;

use src\Models\Pessoa;

class Clientes extends Pessoa{
    public string $modeloComprado;
    public string $corCarro;
    public string $modoPagamento;
    public string $Seguro;
    public bool $querSeguro;

    public function __construct($modeloComprado, $corCarro,$modoPagamento,$Seguro){
        parent::__construct($nome,$idade,$cpf,$rg,$endereco);
        $this->modeloComprado = $modeloComprado;
        $this->corCarro = $corCarro;
        $this->modoPagamento = $modoPagamento;
        $this->Seguro = $Seguro;
        strtolower($this->Seguro) === 'sim' ? $this->querSeguro = true : $this->querSeguro = false;
        
    }

    public function getModelo($modeloComprado){
        $this->modeloComprado = $modeloComprado;
    }

    public function getCor($corCarro){
        $this->corCarro = $corCarro;
    }

    public function getModoPagamento($modoPagamento){
        $this->getModoPagamento = $modoPagamento;
    }

    public function getSeguro($querSeguro){
        $this->querSeguro = $querSeguro;
    }

    public function compraCliente($modoPagamento,$modeloComprado,$querSeguro,$entrada,$precoCarro,$valorSeguro,$numParcelas = 1): string{
        $this->modoPagamento = $modoPagamento;
        $this->modeloComprado = $modeloComprado;
        $this->querSeguro = $querSeguro;

        $valorTotal = $precoCarro;
        if ($this->querSeguro){
            $valorTotal += $valorSeguro;
        }

        $valorRestante = $valorTotal - $entrada;

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