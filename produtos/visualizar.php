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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">  
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <main>
        <h1 class="text-center">Produtos | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
        <h5 class="card-title text-center">Lendo e carregando todos os Produtos</h5>

        <p class="text-center"><a href="inserir.php" class="btn ">Inserir novo Produto</a></p>

        <?php if(isset($_GET["status"]) && $_GET["status"] === "sucesso") { ?>
            <h2 style="color: aquamarine;" class="text-center"> Fabricante Atualizado com sucesso</h2>
        <?php } ?>
        

        <section class="produtos  container mx-auto mt-4 row">
            <?php foreach ($lerprodutos as $produtos){ ?>

            <article class="produto card card-body " style="width: 20rem;">
            
                    <h5 class="card-title"><?=$produtos["produto"]?></h5>
                
                    <h4><?=$produtos["fabricante"]?></h4>
                
                <div class="card-text">
                    <p><b>Preço: </b><?= formatar_preco($produtos["preco"])?></p>
                    <p><b>Quantidade: </b><?=$produtos["quantidade"]?></p>
                    <p><b>Valor total em estoque: </b><?=formatar_preco($produtos["total"])?></p>
                    <p><b>Descrição: </b><?=$produtos["descricao"]?></p>
                     <hr>
                </div>
                <p>
                    <a href="atualizar.php?id=<?=$produtos["id"]?>" class="btn">Editar 🖊</a>
                     <a href="excluir.php?id=<?=$produtos["id"]?>" class="excluir btn">Exlcluir 🗑</a>
                </p>
            </article>       
            <?php }?>
        </section>
    </main>]
    <script src="../js/confirma-exclusao.js"></script>
</body>
</html>