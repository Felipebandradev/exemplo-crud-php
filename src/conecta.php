<?php
// conecta.php

/* Script de conexão ao servidor de Banco de dados */

// Parâmetros
// Xampp
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas";

/* Configurações para conexão (API/Driver de conexão: PDO (PHP Data Object))*/
try{

    // Instância/Objeto PDO para conexão
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;cherset=utf8",
        $usuario,$senha
    );

    // Habilitar a Verificação e sinalização de erros(exeções)
    $conexao->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(Exception $erro){
    /* Exception é uma classe/tipo 
    voltado para tratamento de exceções (erros)*/
    die("Deu ruim: ".$erro->getMessage());
}



