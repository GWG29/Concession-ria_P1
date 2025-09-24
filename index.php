<?php

require_once __DIR__ . '/src/Core/Autoloader.php';
require_once __DIR__ . '/src/Models/Pessoa.php';
require_once __DIR__ . '/src/Models/Cliente.php';
require_once __DIR__ . '/src/Models/Carro.php';
require_once __DIR__ . '/src/Models/Veiculos.php';

use Models\Pessoa;
use Models\Cliente;
use Models\SUV;
use Models\Sedan;
use Models\Caminhonete;

// Arrays globais para simular banco de dados
$carrosDisponiveis = [];
$clientesCadastrados = [];
$todosVeiculos = [];

function inicializarCarros() {
    global $carrosDisponiveis, $todosVeiculos;
    
    // Iniciar com array vazio - carros serão adicionados via cadastro manual
    $carrosDisponiveis = [];
    $todosVeiculos = [];
}

function mostrarCarrosDisponiveis() {
    global $carrosDisponiveis;
    
    echo "\n=== CARROS DISPONÍVEIS ===\n";
    for($i = 0; $i < count($carrosDisponiveis); $i++) {
        $carro = $carrosDisponiveis[$i];
        echo ($i + 1) . " - " . basename(get_class($carro)) . " " . $carro->marca . " " . $carro->modelo . " " . $carro->ano . "\n";
        echo "    Cor: " . $carro->cor . "\n";
        echo "    Preço: R$ " . number_format($carro->preco, 2, ',', '.') . "\n";
        echo "    Combustível: " . $carro->combustivel . "\n";
        echo "    Transmissão: " . ($carro->ehAutomatico ? "Automático" : "Manual") . "\n";
        echo "    Status: " . ($carro->ehUsado ? "Usado (" . number_format($carro->kmRodados, 0, '.', '.') . " km)" : "Novo") . "\n";
        echo "    ----------------------------------------\n";
    }
}

function mostrarClientesCadastrados() {
    global $clientesCadastrados;
    
    if(empty($clientesCadastrados)) {
        echo "Nenhum cliente cadastrado.\n";
        return false;
    }
    
    echo "\n=== CLIENTES CADASTRADOS ===\n";
    for($i = 0; $i < count($clientesCadastrados); $i++) {
        $cliente = $clientesCadastrados[$i];
        echo ($i + 1) . " - " . $cliente->getNomeCompleto() . "\n";
        echo "    CPF: " . $cliente->getCpf() . "\n";
        echo "    Idade: " . $cliente->idade . "\n";
        echo "    ----------------------------------------\n";
    }
    return true;
}

function cadastrarNovoCliente() {
    echo "\n=== CADASTRO DE NOVO CLIENTE ===\n";
    echo "Nome: \n";
    $nome = trim(readline());
    echo "Idade: \n";
    $idade = (int) trim(readline());
    echo "CPF: \n";
    $cpf = trim(readline());
    echo "RG: \n";
    $rg = trim(readline());
    echo "Endereço: \n";
    $endereco = trim(readline());
    
    $cliente = new Cliente($nome, $idade, $cpf, $rg, $endereco, "", "", "", "");
    
    global $clientesCadastrados;
    $clientesCadastrados[] = $cliente;
    
    echo "Cliente cadastrado com sucesso!\n";
    return $cliente;
}

function Menu(): void{
    echo "====================\n";
    echo "        MENU        \n";
    echo "====================\n";

    // exemplos de opções, passível de mudanças
    echo "1 - Cadastrar clientes\n";
    echo "2 - Realizar compra\n";
    echo "3 - Cadastrar veículos\n";
    echo "4 - Ver todos os veículos cadastrados\n";
    echo "0 - Sair do programa\n";
}

// Inicializar carros de exemplo
inicializarCarros();

while(true){
    Menu();
        echo "Digite a opção escolhida: \n";
        $op = readline();

        $op_t = (int)$op;

    switch($op_t){
        case 0:
            echo "Saindo do programa...\n";
            exit(0);
            break;
            
        case 1:
            echo "Nome: \n";
            $nome = trim(readline());
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
            
            // Adicionar à lista de clientes cadastrados
            global $clientesCadastrados;
            $clientesCadastrados[] = $cliente;
            
            echo "Cliente cadastrado com sucesso!\n";
            echo "Nome: " . $cliente->getNomeCompleto() . "\n";
            echo "Idade: " . $cliente->idade . "\n";
            echo "CPF: " . $cliente->getCpf() . "\n";
            echo "Modelo comprado: " . $cliente->getModelo() . "\n";
            echo "Cor: " . $cliente->getCor() . "\n";
            echo "Pagamento: " . $cliente->getModoPagamento() . "\n";
            echo "Seguro: " . ($cliente->getQuerSeguro() ? "Sim" : "Não") . "\n";

            echo "Pressione Enter para continuar...";
            readline();
            break;

        case 2:
            // Verificar se há carros cadastrados
            if(empty($carrosDisponiveis)) {
                echo "\nNenhum carro cadastrado ainda!\n";
                echo "Por favor, cadastre alguns veículos primeiro (opção 3).\n";
                echo "Pressione Enter para continuar...";
                readline();
                break;
            }
            
            // ETAPA 1: Mostrar carros disponíveis
            mostrarCarrosDisponiveis();
            
            echo "Digite o número do carro desejado (ou 0 para voltar): \n";
            $opcaoCarro = (int) trim(readline());
            
            if($opcaoCarro == 0) {
                break;
            }
            
            if($opcaoCarro < 1 || $opcaoCarro > count($carrosDisponiveis)) {
                echo "Opção inválida!\n";
                echo "Pressione Enter para continuar...";
                readline();
                break;
            }
            
            $carroSelecionado = $carrosDisponiveis[$opcaoCarro - 1];
            
            echo "\nCarro selecionado: " . basename(get_class($carroSelecionado)) . " " . $carroSelecionado->marca . " " . $carroSelecionado->modelo . "\n";
            echo "Preço: R$ " . number_format($carroSelecionado->preco, 2, ',', '.') . "\n";
            
            // ETAPA 2: Selecionar cliente
            $clienteSelecionado = null;
            
            echo "\n=== SELEÇÃO DE CLIENTE ===\n";
            echo "1 - Usar cliente existente\n";
            echo "2 - Cadastrar novo cliente\n";
            echo "Digite sua opção: \n";
            $opcaoCliente = (int) trim(readline());
            
            if($opcaoCliente == 1) {
                if(mostrarClientesCadastrados()) {
                    echo "Digite o número do cliente: \n";
                    $numeroCliente = (int) trim(readline());
                    
                    if($numeroCliente >= 1 && $numeroCliente <= count($clientesCadastrados)) {
                        $clienteSelecionado = $clientesCadastrados[$numeroCliente - 1];
                        echo "Cliente selecionado: " . $clienteSelecionado->getNomeCompleto() . "\n";
                    } else {
                        echo "Cliente inválido! Cadastrando novo cliente...\n";
                        $clienteSelecionado = cadastrarNovoCliente();
                    }
                } else {
                    echo "Cadastrando novo cliente...\n";
                    $clienteSelecionado = cadastrarNovoCliente();
                }
            } else {
                $clienteSelecionado = cadastrarNovoCliente();
            }
            
            // ETAPA 3: Dados da compra
            echo "\n=== DADOS DA COMPRA ===\n";
            echo "Modo de pagamento (a vista/parcelado): \n";
            $modoPagamento = trim(readline());

            echo "Quer seguro? (sim/não): \n";
            $seguroResposta = trim(readline());
            $querSeguro = strtolower($seguroResposta) === 'sim';

            echo "Valor da entrada: \n";
            $entrada = (float) trim(readline());

            echo "Valor do seguro: \n";
            $valorSeguro = (float) trim(readline());

            echo "Número de parcelas (padrão = 1): \n";
            $numParcelas = (int) trim(readline()) ?: 1;
            
            // Atualizar dados do cliente
            $clienteSelecionado->modeloComprado = $carroSelecionado->modelo;
            $clienteSelecionado->corCarro = $carroSelecionado->cor;
            $clienteSelecionado->modoPagamento = $modoPagamento;
            $clienteSelecionado->Seguro = $seguroResposta;
            $clienteSelecionado->querSeguro = $querSeguro;

            $resultado = $clienteSelecionado->compraCliente($modoPagamento, $carroSelecionado->modelo, $querSeguro, $entrada, $carroSelecionado->preco, $valorSeguro, $numParcelas);
           
            echo "\n=== COMPRA REALIZADA COM SUCESSO! ===\n";
            echo "Cliente: " . $clienteSelecionado->getNomeCompleto() . "\n";
            echo "Veículo: " . basename(get_class($carroSelecionado)) . " " . $carroSelecionado->marca . " " . $carroSelecionado->modelo . " (" . $carroSelecionado->cor . ")\n";
            echo "Modo de pagamento: " . $modoPagamento . "\n";
            echo "Seguro: " . ($querSeguro ? "Sim" : "Não") . "\n";
            echo "Total: R$ " . number_format($resultado['total'], 2, ',', '.') . "\n";
            echo "Parcelas: " . $resultado['parcelas'] . "\n";
            echo "Valor por parcela: R$ " . number_format($resultado['valorParcelas'], 2, ',', '.') . "\n";
            
            echo "\nPressione Enter para continuar...";
            readline();
            
            break;
            
        case 3:
            echo "Cadastramento de veículos\n";
            echo "Escolha o tipo de veículo:\n";
            echo "1 - SUV\n";
            echo "2 - Sedan\n";
            echo "3 - Caminhonete\n";
            echo "Digite o tipo: \n";
            $tipoVeiculo = (int) trim(readline());
            
            // Dados básicos do veículo
            echo "Marca: \n";
            $marca = trim(readline());
            echo "Modelo: \n";
            $modelo = trim(readline());
            echo "Ano: \n";
            $ano = (int) trim(readline());
            echo "Cor: \n";
            $cor = trim(readline());
            echo "Preço: \n";
            $preco = (float) trim(readline());
            echo "É usado? (sim/não): \n";
            $ehUsado = strtolower(trim(readline())) === 'sim';
            
            if($ehUsado) {
                echo "Km rodados: \n";
                $km = (int) trim(readline());
            } else {
                $km = 0; // Veículo novo = 0 km
                echo "Veículo novo definido com 0 km.\n";
            }
            
            echo "É automático? (sim/não): \n";
            $ehAutomatico = strtolower(trim(readline())) === 'sim';
            echo "Combustível: \n";
            $combustivel = trim(readline());
            echo "Status:\n";
            echo "1 - Pronto para venda\n";
            echo "2 - Não está à venda\n";
            echo "3 - Em manutenção\n";
            echo "Escolha o status: \n";
            $statusOpcao = (int) trim(readline());
            
            switch($statusOpcao) {
                case 1:
                    $status = "Pronto para venda";
                    break;
                case 2:
                    $status = "Não está à venda";
                    break;
                case 3:
                    $status = "Em manutenção";
                    break;
                default:
                    $status = "Não está à venda";
                    echo "Opção inválida, definido como 'Não está à venda'\n";
                    break;
            }
            
            echo "Número de portas: \n";
            $portas = (int) trim(readline());
            
            switch($tipoVeiculo) {
                case 1:
                    echo "Tipo de tração: \n";
                    $tracao = trim(readline());
                    echo "É OffRoad? (sim/não): \n";
                    $offRoad = strtolower(trim(readline())) === 'sim';
                    
                    $veiculo = new SUV($marca, $modelo, $ano, $cor, $preco, "", $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas, $tracao, $offRoad);
                    echo "SUV cadastrado com sucesso!\n";
                    break;
                    
                case 2:
                    echo "Nível de luxo: \n";
                    $luxo = trim(readline());
                    echo "Nível de conforto: \n";
                    $conforto = trim(readline());
                    
                    $veiculo = new Sedan($marca, $modelo, $ano, $cor, $preco, "", $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas, $luxo, $conforto);
                    echo "Sedan cadastrado com sucesso!\n";
                    break;
                    
                case 3:
                    echo "Capacidade de carga (kg): \n";
                    $capacidadeCarga = (int) trim(readline());
                    echo "Tipo de cabine: \n";
                    $tipoCabine = trim(readline());
                    
                    $veiculo = new Caminhonete($marca, $modelo, $ano, $cor, $preco, "", $ehUsado, $km, $ehAutomatico, $combustivel, $status, $portas, $capacidadeCarga, $tipoCabine);
                    echo "Caminhonete cadastrada com sucesso!\n";
                    break;
                    
                default:
                    echo "Tipo de veículo inválido!\n";
                    break;
            }
            
            if(isset($veiculo)) {
                // Adicionar o veículo à lista de todos os veículos
                global $carrosDisponiveis, $todosVeiculos;
                $todosVeiculos[] = $veiculo;
                
                // Adicionar à lista de carros disponíveis apenas se estiver pronto para venda
                if($status === "Pronto para venda") {
                    $carrosDisponiveis[] = $veiculo;
                    $mensagemDisponibilidade = "Veículo adicionado à lista de carros disponíveis para compra!";
                } else {
                    $mensagemDisponibilidade = "Veículo cadastrado mas não está disponível para compra (Status: " . $status . ")";
                }
                
                echo "\n=== DADOS DO VEÍCULO ===\n";
                echo "Tipo: " . basename(str_replace('\\', '/', get_class($veiculo))) . "\n";
                echo "Marca: " . $veiculo->marca . "\n";
                echo "Modelo: " . $veiculo->modelo . "\n";
                echo "Ano: " . $veiculo->ano . "\n";
                echo "Cor: " . $veiculo->cor . "\n";
                echo "Preço: R$ " . number_format($veiculo->preco, 2, ',', '.') . "\n";
                echo "Condição: " . ($veiculo->ehUsado ? "Usado" : "Novo") . "\n";
                echo "Combustível: " . $veiculo->combustivel . "\n";
                echo "Transmissão: " . ($veiculo->ehAutomatico ? "Automático" : "Manual") . "\n";
                echo "Status: " . $veiculo->status . "\n";
                echo "\n" . $mensagemDisponibilidade . "\n";
            }
            
            echo "\nPressione Enter para continuar...";
            readline();
            break;
            
        case 4:
            echo "=== TODOS OS VEÍCULOS CADASTRADOS ===\n\n";
            global $todosVeiculos, $carrosDisponiveis;
            
            if(empty($todosVeiculos)) {
                echo "Nenhum veículo cadastrado.\n";
            } else {
                echo "Total de veículos encontrados: " . count($todosVeiculos) . "\n\n";
                
                // Mostrar todos os veículos diretamente
                foreach($todosVeiculos as $index => $veiculo) {
                    $tipo = basename(str_replace('\\', '/', get_class($veiculo)));
                    
                    echo "=== VEÍCULO " . ($index + 1) . " ===\n";
                    echo "Tipo: " . $tipo . "\n";
                    echo "Marca: " . $veiculo->marca . "\n";
                    echo "Modelo: " . $veiculo->modelo . "\n";
                    echo "Ano: " . $veiculo->ano . "\n";
                    echo "Cor: " . $veiculo->cor . "\n";
                    echo "Preço: R$ " . number_format($veiculo->preco, 2, ',', '.') . "\n";
                    echo "Condição: " . ($veiculo->ehUsado ? "Usado" : "Novo") . "\n";
                    if($veiculo->ehUsado) {
                        echo "Km: " . number_format($veiculo->kmRodados, 0, ',', '.') . " km\n";
                    }
                    echo "Combustível: " . $veiculo->combustivel . "\n";
                    echo "Transmissão: " . ($veiculo->ehAutomatico ? "Automático" : "Manual") . "\n";
                    echo "Portas: " . $veiculo->portas . "\n";
                    echo "STATUS: " . $veiculo->status . "\n";
                    
                    // Mostrar características específicas
                    if($tipo === 'SUV' && isset($veiculo->tracao) && $veiculo->tracao) {
                        echo "Tração: " . $veiculo->tracao . "\n";
                        echo "OffRoad: " . ($veiculo->OffRoad ? "Sim" : "Não") . "\n";
                    } elseif($tipo === 'Sedan' && isset($veiculo->luxo) && $veiculo->luxo) {
                        echo "Luxo: " . $veiculo->luxo . "\n";
                        echo "Conforto: " . $veiculo->conforto . "\n";
                    } elseif($tipo === 'Caminhonete' && isset($veiculo->capacidadeCarga) && $veiculo->capacidadeCarga) {
                        echo "Capacidade de carga: " . $veiculo->capacidadeCarga . " kg\n";
                        echo "Tipo de cabine: " . $veiculo->tipoCabine . "\n";
                    }
                    echo "\n" . str_repeat("-", 40) . "\n\n";
                }
            }
            
            echo "\nPressione Enter para continuar...";
            readline();
            break;
            
        default:
            echo "Opção inválida, pressione qualquer tecla para continuar\n";
            readline();
            break;
    }
}




