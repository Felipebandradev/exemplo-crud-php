<?php

require_once "conecta.php";

// usada em fabricantes/visualizar.php
function ler_fabricantes( PDO $conexao ){
   $sql = "SELECT * FROM fabricantes ORDER BY nome";

   try {    
       /* Método prepare(): 
        Faz uma preparação/pré-config do comando SQL e
        guarda em memória (variável consulta). */
    $consulta = $conexao->prepare($sql);

    /* Método execute():
        Executa o comando SQL no banco de dados */
    $consulta->execute();

      /* Método fetchAll()
        Busca todos os dados da consulta como um array
        associativo. */
    $resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
   } catch (Exception $erro) {

    die("ERRO: ".$erro->getMessage());

   }

   return $resultado;
}; // Fim ler_fabricantes


// Usada em fabricantes/inserir.php
function inserir_fabricantes(PDO $conexao, string $nome_do_fabricante){
    /* :qualquercoisa -> isso indica um "named parameter"
    (parâmetro nomeado) */
    $sql = "INSERT INTO fabricantes(nome) VALUES (:nome)";

    try {
        $consulta = $conexao->prepare($sql);

         // bindValue() -> permite vincular o valor existente no parâmetro nomeado (:nome) à consulta que será executada. É necessário indicar qual é o parâmetro (:nome), de onde vem o valor ($nomeDoFabricante) e de  que tipo ele é (PDO::PARAM_STR) 
        $consulta->bindValue(":nome",$nome_do_fabricante, PDO::PARAM_STR);

        $consulta->execute();
    } catch (Exception $erro) {
       die("Erro ao inserir:".$erro->getMessage());
    }

}; // fim inserir_fabricantes



// Usada em fabricantes/atualizar.php
function ler_um_fabricante(PDO $conexao, int $id_fabricante) {
    $sql ="SELECT * FROM fabricantes WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id_fabricante, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao Cerregar: ".$erro->getMessage());
    }

    return $resultado;
}; // fim ler um fabricante

// Usada em fabricantes/atualizar.php
function atualizar_fabricante(PDO $conexao, string $nome_do_fabricante, int $id_do_fabricante){
    $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id" ;
    try{
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":nome",$nome_do_fabricante, PDO::PARAM_STR);
    $consulta->bindValue(":id",$id_do_fabricante,PDO::PARAM_INT);
    $consulta->execute();
    } catch(Exception $erro){
        die("Erro ao Atualizar: ".$erro->getMessage());
    }
}; // fim atualizar um fabricante

function deletar_fabricante(PDO $conexao, int $id_fabricante){
    $sql = "DELETE FROM fabricantes WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id",$id_fabricante,PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao Deletar: ".$erro->getMessage());
    }
};