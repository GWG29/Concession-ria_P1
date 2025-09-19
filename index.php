<?php

require_once __DIR__ . '/src/Core/Autoloader.php';
require_once __DIR__ . '/src/Models/Pessoa.php';

use src\Models\Pessoa;

// Instanciando normalmente, sem 'use'
$cliente = new Pessoa();

$cliente->nome=readline("Digite o nome do cliente: ");
$cliente->sobrenome=readline("Digite o sobrenome do cliente: ");
$cliente->idade=readline("Digite a idade do cliente: ");
$cliente->setCpf(readline("Digite o CPF do cliente: "));
$cliente->setRg(readline("Digite o RG do cliente: "));
$cliente->setEndereco(readline("Digite o endereço do cliente: "));
echo "Nome: " . $cliente->getNomeCompleto() . "\nIdade: " . $cliente->idade . "\nCPF: " . $cliente->getCpf() . "\nRG: " . $cliente->getRg() . "\nEndereço: " . $cliente->getEndereco() . "\n";