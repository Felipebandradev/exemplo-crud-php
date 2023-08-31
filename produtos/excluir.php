<?php
require_once "../src/funcoes-produtos.php";

$id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);

excluir_produto($conexao,$id);

header("location:visualizar.php");