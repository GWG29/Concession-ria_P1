<?php

require_once __DIR__ . '/src/Core/Autoloader.php';

use Models\Cliente;
use Models\Pessoa;

// Instanciando normalmente, sem 'use'
$cliente = new Pessoa();

$cliente->nome=readline("Digite o nome do cliente: ");
$cliente->idade=readline("Digite a idade do cliente: ");
$cliente->cpf=readline("Digite o CPF do cliente: ");
$cliente->rg=readline("Digite o RG do cliente: ");
$cliente->endereco=readline("Digite o endereço do cliente: ");
echo "Nome: $cliente->nome\nIdade: $cliente->idade\nCPF: $cliente->cpf\nRG: $cliente->rg\nEndereço: $cliente->endereco\n";