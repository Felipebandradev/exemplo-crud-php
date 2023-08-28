<?php

require_once "conecta.php";

function ler_produtos(PDO $conexao)  {
    $sql = "SELECT * FROM produtos ORDER BY nome " ;

/*     try {
        $consulta = $conexao->prepare($sql) ;
    } catch () {
        
    } */
}