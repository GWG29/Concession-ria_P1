<?php

require_once __DIR__ . '/src/Core/Autoloader.php';
require_once __DIR__ . '/src/Models/Pessoa.php';
require_once __DIR__ . '/src/Models/Cliente.php';
require_once __DIR__ . '/src/Models/Carro.php';
require_once __DIR__ . '/src/Models/Veiculos.php';

use src\Models\Pessoa;

function Menu(): void{
    echo "====================";
    echo "        MENU        ";
    echo "====================";

    // exemplos de opções, passível de mudanças
    echo "1 - Cadastrar clientes";
    echo "2 - Realizar compra";
    echo "3 - Cadastrar veículos";
    echo "0 - Sair do programa";
}

while(true){
    Menu();
        echo "Digite a opção escolhida: \n";
        $op = readline();

        if(strtolower(string: trim(string: $op) == "0")){
            // seguindo o exemplo de CLI, saímos do programa caso seja '0'
            break;
        }

        $op_t = int($op);

    switch($op_t){
        case 1:
            echo "Cadastramento de clientes\n";

            break;
            ;
        case 2:
            $this->compraCliente();
            break;
            ;
        case 3:
            echo "Cadastamento de veículos\n";
            break;
            ;
        default:
            echo "Opção inválida, pressione qualquer tecla para continuar\n";
            readline();
            break;
            ;
    }
}








// Instanciando normalmente, sem 'use'
$cliente = new Cliente();

$cliente->nome=readline("Digite o nome do cliente: ");
$cliente->sobrenome=readline("Digite o sobrenome do cliente: ");
$cliente->idade=readline("Digite a idade do cliente: ");
$cliente->setCpf(readline("Digite o CPF do cliente: "));
$cliente->setRg(readline("Digite o RG do cliente: "));
$cliente->setEndereco(readline("Digite o endereço do cliente: "));
echo "Nome: " . $cliente->getNomeCompleto() . "\nIdade: " . $cliente->idade . "\nCPF: " . $cliente->getCpf() . "\nRG: " . $cliente->getRg() . "\nEndereço: " . $cliente->getEndereco() . "\n";