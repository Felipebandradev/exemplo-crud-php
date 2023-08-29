<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-utilitarias.php";

$lerprodutos = ler_produtos($conexao);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>

    <style>
        .produtos{
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            width: 80%;
            margin: auto;
           
        }

        .produto{
            color: aliceblue;
             width: 40%; 
            background-color: #ab212e;
            border: 1px #3d761d solid;
            padding: 1rem;
            box-shadow: black 0 0 10px;
        }
    </style>
</head>
<body>
    <main>
        <h1>Produtos | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
        <h2>Lendo e carregando todos os Produtos</h2>

        <p><a href="inserir.php">Inserir novo Produto</a></p>

        <section class="produtos">
            <?php foreach ($lerprodutos as $produtos){ ?>
                
            <article class="produto">
                <h3><?=$produtos["nome"]?></h3>
                <p><b>Preço: </b><?= formatar_preco($produtos["preco"])?></p>
                <p><b>Quantidade: </b><?=$produtos["quantidade"]?></p>
            </article>       
            <?php }?>
        </section>
    </main>
</body>
</html>