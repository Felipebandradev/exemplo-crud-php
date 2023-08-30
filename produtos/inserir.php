<?php
require_once "../src/funcoes-fabricantes.php";
require_once "../src/funcoes-produtos.php";

$lerfabricante = ler_fabricantes($conexao);

if(isset($_POST['inserir'])){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(
        INPUT_POST, "preco",
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );

    $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);

    // Pegaremos o Value, ou seja, o valor do id do fabricante
    $fabricanteid = filter_input(INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT);

    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    // Teste
    //echo $nome, $preco, $quantidade, $fabricanteid, $descricao;

    inserirProduto(
        $conexao, $nome, $preco, $quantidade, $fabricanteid, $descricao
    );

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos | INSERT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">   
     <link rel="stylesheet" href="../css/estilos.css">

</head>
<body>
    <main>
    <h1 class="text-center">Produtos| INSERT - <a href="../index.php">Home</a></h1>
    
    <form action="" method="post"  class="row g-3 container-lg m-auto p-5 ">
        <div class="col-md-6">
            <p>
            <label for="nome"  class="form-label">Produto: </label>
            <input type="text" class="form-control" required name="nome" id="nome">
            </p>
            
        </div>
        
        <div class="col-md-6">
            <p>
                <label for="preco"  class="form-label">Preço: </label>
                <input type="number" min="10" max="10000" step="0.01"   name="preco" id="preco" class="form-control" required>
            </p>
        </div>

        <div class="col-md-6">
            <p>
                <label for="quantidade"  class="form-label">Quantidade: </label>
                <input type="number" name="quantidade" id="quantidade" min="10" max="100" class="form-control" required>
            </p>
        </div>

        <div class="col-md-6">
            <p>
                <label for="fabricante"  class="form-label">Fabricante</label>
                <select name="fabricante" id="fabricante" class="form-select" >
                    <option value=""></option>
                    <?php foreach($lerfabricante as $fabricante){ ?>
                        <option value="<?=$fabricante["id"]?>"><?=$fabricante["nome"]?></option>
                    <?php }?>
                </select>
            </p>
        </div>
        <p> 
            <label for="descricao"  class="form-label">Descrição: </label><br>
            <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control" ></textarea>
        </p>
        <button type="submit" name="inserir" class="btn btn-primary">Inserir Produto</button>
        
        <p ><a href="visualizar.php" class="btn">Voltar</a></p>
    </form>
    
    
    </main>
</body>
</html>