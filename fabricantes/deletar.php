<?php
require_once "../src/funcoes-fabricantes.php";

$id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT);

deletar_fabricante($conexao,$id);

header("location:visualizar.php");