<?php

require_once __DIR__ . '/src/Core/Autoloader.php';

// Instanciando normalmente, sem 'use'
$carro = new Carro("Toyota Corolla", "Prata", 2020);
$vendedor = new Vendedor("João", "12345", "99999-9999", $carro);

echo $vendedor->anunciarVenda();