<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-fabricantes.php";
$id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);

$produto =ler_um_produto($conexao,$id);

$lerfabricante = ler_fabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos | SELECT/UPDATE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">   
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <main>
    <h1 class="text-center">Produtos| SELECT/UPDATE - <a href="../index.php">Home</a></h1>
    
    <form action="" method="post"  class="row g-3 container-lg m-auto p-5 ">
        <div class="col-md-6">
            <p>
            <label for="nome"  class="form-label">Produto: </label>
            <input value="<?=$produto["nome"]?>" type="text" class="form-control" required name="nome" id="nome">
            </p>
            
        </div>
        
        <div class="col-md-6">
            <p>
                <label for="preco"  class="form-label">Preço: </label>
                <input type="number" min="10" max="10000" step="0.01"   name="preco" id="preco" class="form-control" value="<?=$produto["preco"]?>" required>
            </p>
        </div>

        <div class="col-md-6">
            <p>
                <label for="quantidade"  class="form-label">Quantidade: </label>
                <input type="number" name="quantidade" id="quantidade" min="10" max="100" class="form-control" value="<?=$produto["quantidade"]?>" required>
            </p>
        </div>

        <div class="col-md-6">
            <p>
                <label for="fabricante"  class="form-label">Fabricante</label>
                <select name="fabricante" id="fabricante" class="form-select" >
                    <option value=""></option>
                    <?php 
                        foreach($lerfabricante as $fabricante){ 
                    ?>
                     <option <?php if($produto["fabricante_id"] === $fabricante["id"]){ ?> selected <?php } ?> value="<?=$fabricante["id"]?>"> 
                    <?=$fabricante["nome"]?>
                    </option>
                    <?php } ?>
                   
                </select>
            </p>
        </div>
        <p> 
            <label for="descricao"  class="form-label">Descrição: </label><br>
            <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control"  ><?=$produto["descricao"]?></textarea>
        </p>
        <button type="submit" name="inserir" class="btn btn-primary">Atualizar Produto 🖋</button>
        
        <p><a href="visualizar.php" class="btn">Voltar 	&#9756;</a></p>
    </form>
    
    
    </main>
</body>
</html>