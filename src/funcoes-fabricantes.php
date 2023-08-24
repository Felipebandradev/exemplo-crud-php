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
};

