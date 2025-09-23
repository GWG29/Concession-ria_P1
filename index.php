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
            echo "Idade: \n";
            $idade = (int) trim(readline());
            echo "CPF: \n";
            $cpf = trim(readline());
            echo "RG: \n";
            $rg = trim(readline());
            echo "Endereço: \n";
            $endereco = trim(readline());

            // Dados específicos
            echo "Modelo do carro comprado: \n";
            $modeloComprado = trim(readline());

            echo "Cor do carro: \n";
            $corCarro = trim(readline());

            echo "Modo de pagamento: \n";
            $modoPagamento = trim(readline());

            echo "Quer seguro? (sim/não): \n";
            $seguro = trim(readline());
           
            // Instância/cadastra o cliente 
            $cliente = new Cliente($nome, $idade, $cpf, $rg, $endereco, $modeloComprado, $corCarro, $modoPagamento, $seguro);
            
            echo $resultado . "\n";

            echo "Pressione Enter para continuar...";
            readline();
            break;

            ;
        case 2:
           // Dados da compra
            echo "Modo de pagamento (a vista/parcelado): \n";
            $modoPagamento = trim(readline());

            echo "Modelo comprado: \n";
            $modeloComprado = trim(readline());

            echo "Quer seguro? (1 para sim, 0 para não): \n";
            $querSeguro = (bool) (int) trim(readline());

            echo "Valor da entrada: \n";
            $entrada = (float) trim(readline());

            echo "Preço do carro: \n";
            $precoCarro = (float) trim(readline());

            echo "Valor do seguro: \n";
            $valorSeguro = (float) trim(readline());

            echo "Número de parcelas (padrão = 1): \n";
            $numParcelas = (int) trim(readline()) ?: 1;

            $resultado = $cliente->compraCliente($modoPagamento, $modeloComprado, $querSeguro, $entrada, $precoCarro, $valorSeguro, $numParcelas);
           
            echo "Compra Realizada com sucesso!";
            // Usei o number format pra poder formatar o valor e exibir melhor como dados financeiros
            // Assim consigo formatar pro formato brasileiro de exibição monetária
            // '.' pra separar os milhares, ',' pros centavos, '2' zeros depois da vírgula...
            echo "Total: R$ " . number_format($resultado['total'], 2, ',', '.') . "\n";

            echo "Parcelas: " . $resultado['parcelas'] . "\n";

            // mesma coisa do uso de number format ali em cima, porém pro valor das parcelas :P
            echo "Valor por parcela: R$ " . number_format($resultado['valorParcelas'], 2, ',', '.') . "\n";
            
            echo "Pressione Enter para continuar...";
            readline();
            
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