# Concession-ria_P1
Projeto para a prova P1 de Programação Orientada a Objetos

# Integrantes

- Mateus Yan Molder de Andrade Custodio, RA: 2037940;
- Levi Cohen Silva, RA: 2034499;
- Marcos Henrique D'Aloia Junior, RA: 2036111.

# Funcionamento do programa

## Estrutura de Arquivos

- **index.php**: Nosso arquivo principal que contém o menu, loops de execução e todas as funcionalidades do sistema.
- **Autoloader.php**: Sistema de carregamento automático de classes (não mostrado no código).
- **Pessoa.php**: Classe base para representar pessoas.
- **Cliente.php**: Classe que representa os clientes da concessionária.
- **Carro.php**: Classe base para veículos.
- **Veiculos.php**: Possivelmente contém definições relacionadas a veículos (não mostrado).
- **`src/Models/SUV.php`, `src/Models/Sedan.php`, `src/Models/Caminhonete.php`**: Classes específicas para diferentes tipos de veículos.

## Classes e Modelos

### Classe Pessoa
```php
class Pessoa {
    public string $nome;
    public string $sobrenome;
    public int $idade;
    public string $cpf;
    public string $rg;
    public string $endereco;
    
    public function __construct($nome, $sobrenome, $idade, $cpf, $rg, $endereco) {
        // Inicializa as propriedades da pessoa
    }
    
    // Métodos getters e setters para acessar as propriedades/atributos de pessoa. 
}
```
**Função de Pessoa**: Representa uma pessoa genérica com dados comuns. Classe abstrata que serve como base para a classe Cliente.

### Classe Cliente
```php
class Cliente extends Pessoa {
    public string $modeloComprado;
    public string $corCarro;
    public string $modoPagamento;
    public string $Seguro;
    public bool $querSeguro;
    
    public function __construct($nome, $idade, $cpf, $rg, $endereco, $modeloComprado, $corCarro, $modoPagamento, $Seguro) {
        parent::__construct($nome, "", $idade, $cpf, $rg, $endereco);
        // Inicializa propriedades específicas do cliente
        $this->querSeguro = strtolower($this->Seguro) === 'sim';
    }
    
    public function compraCliente($modoPagamento, $modeloComprado, $querSeguro, $entrada, $precoCarro, $valorSeguro, $numParcelas): array {
        // Calcula o valor total da compra com juros/descontos
        // Retorna array com total, parcelas e valor das parcelas
    }
}
```
**Função**: Representa um cliente da concessionária. Herda os atributos e métodos da classe Pessoa e adiciona dados específicos da compra. O método `compraCliente` calcula financiamentos e preço de seguros.

### Classe Carro (Base)
```php
class Carro {
    public string $marca;
    public string $modelo;
    public int $ano;
    public string $cor;
    public float $preco;
    public string $origem;
    public bool $ehUsado;
    public int $kmRodados;
    public bool $ehAutomatico;
    public string $combustivel;
    public string $status;
    public int $portas;
    
    public function __construct(...) {
        // Inicializa todas as propriedades do veículo
    }
}
```
**Função**: Classe base para todos os veículos, contendo atributos comuns como marca, modelo, ano, entre outros.

### Classes Específicas de Veículos
- **SUV**: Adiciona propriedades como `$tracao` e `$OffRoad`.
- **Sedan**: Adiciona `$luxo` e `$conforto`.
- **Caminhonete**: Adiciona `$capacidadeCarga` e `$tipoCabine`.

**Função**: Cada subclasse representa um tipo específico de veículo com características únicas.

## Lógica Principal (index.php)

### Inicialização e Arrays Globais
```php
$carrosDisponiveis = [];  // Representa os veículos que estão prontos para venda;
$clientesCadastrados = []; // Nossa lista de clientes;
$todosVeiculos = [];       // Todos os veículos cadastrados do sistema da concessionária (independente do status).
```
**Função**: São arrays globais simulam um banco de dados simples. `$carrosDisponiveis` contém apenas veículos com status "Pronto para venda".

### Função `inicializarCarros()`
```php
function inicializarCarros() {
    global $carrosDisponiveis, $todosVeiculos;
    $carrosDisponiveis = [];
    $todosVeiculos = [];
}
```
**Função**: Inicializa os arrays vazios. Veículos são adicionados via cadastro manual.

### Função `Menu()`
```php
function Menu(): void {
    echo "====================\n";
    echo "        MENU        \n";
    echo "====================\n";
    echo "1 - Cadastrar clientes\n";
    echo "2 - Realizar compra\n";
    echo "3 - Cadastrar veículos\n";
    echo "4 - Ver todos os veículos cadastrados\n";
    echo "0 - Sair do programa\n";
}
```
**Função**: Exibe o nosso menu principal com as opções de ação disponíveis no sistema.

### Loop Principal
```php
while(true) {
    Menu();
    echo "Digite a opção escolhida: \n";
    $op = readline();
    $op_t = (int)$op;  // Converte para inteiro
    
    switch($op_t) {
        case 0: exit(0); break;  // Sai do programa
        case 1: /* Cadastro de cliente */ break;
        case 2: /* Realizar compra */ break;
        case 3: /* Cadastrar veículo */ break;
        case 4: /* Ver veículos */ break;
        default: echo "Opção inválida"; break;
    }
}
```
**Função**: Looping infinito (´´´while (true)´´´) que mantém o programa rodando. Lê a opção do usuário, converte para inteiro com typecasting e executa a ação correspondente descrita no switch.

## Funcionalidades Específicas

### Opção 1: Cadastrar Clientes
```php
case 1:
    // Coleta os dados captados via readline()
    $cliente = new Cliente($nome, $idade, $cpf, $rg, $endereco, $modeloComprado, $corCarro, $modoPagamento, $seguro);
    $clientesCadastrados[] = $cliente;  // Adiciona ao array global
    // Exibe os dados do cliente cadastrado
```
**Função**: Coleta os dados do cliente (nome, idade, CPF, entre outros.) e cria uma instância de Cliente. Adiciona à lista global e mostra confirmação de cadastro.

### Opção 2: Realizar Compra
```php
case 2:
    if(empty($carrosDisponiveis)) { /* Avisa que não há carros */ }
    
    mostrarCarrosDisponiveis();  // Lista carros disponíveis
    $opcaoCarro = (int) trim(readline());  // Usuário escolhe carro
    
    // Seleção de cliente (existente ou novo)
    if($opcaoCliente == 1) {
        mostrarClientesCadastrados();  // Lista clientes
        // Seleciona ou cadastra novo
    }
    
    // Coleta os dados da compra (pagamento, seguro, entrada)
    $resultado = $clienteSelecionado->compraCliente(...);
    // Exibe o resumo da compra
```
**Função**: Processo completo de compra:
1. Verifica se há carros disponíveis no sistema;
2. Mostra a lista de carros e permite a seleção;
3. Permite escolher entre cliente existente ou cadastrar um novo cliente;
4. Coleta os dados de pagamento e calcula os valores através do método `compraCliente`;
5. Exibe um resumo completo da transação.

### Opção 3: Cadastrar Veículos
```php
case 3:
    // Coleta tipo de veículo (1-SUV, 2-Sedan, 3-Caminhonete)
    // Coleta dados básicos (marca, modelo, ano, etc.)
    
    // Pergunta se é usado; se não, define km=0 automaticamente
    if(!$ehUsado) {
        $km = 0;
        echo "Veículo novo definido com 0 km.\n";
    }
    
    // Coleta status (Pronto para venda, Não está à venda, Em manutenção)
    switch($statusOpcao) {
        case 1: $status = "Pronto para venda"; break;
        // ...
    }
    
    // Cria instância específica baseada no tipo
    $veiculo = new SUV(...) ou new Sedan(...) ou new Caminhonete(...);
    
    // Adiciona a $todosVeiculos sempre
    $todosVeiculos[] = $veiculo;
    
    // Adiciona a $carrosDisponiveis apenas se "Pronto para venda"
    if($status === "Pronto para venda") {
        $carrosDisponiveis[] = $veiculo;
    }
```
**Função**: Cadastro completo de veículos:
- Coleta os dados comuns e específicos por tipo;
- Define automaticamente km = 0 para veículos novos;
- Define status que controla a disponibilidade para venda do veículo;
- Adiciona o veículo à lista global e condicionalmente à lista de veículos disponíveis;

### Opção 4: Ver Todos os Veículos Cadastrados
```php
case 4:
    if(empty($todosVeiculos)) {
        echo "Nenhum veículo cadastrado.\n";
    } else {
        foreach($todosVeiculos as $index => $veiculo) {
            // Exibe todas as informações do veículo
            // Inclui características específicas por tipo
            echo "STATUS: " . $veiculo->status . "\n";
        }
    }
```
**Função**: Lista todos os veículos cadastrados independentemente do status, mostrando as informações completas e as características específicas de cada tipo existente.


