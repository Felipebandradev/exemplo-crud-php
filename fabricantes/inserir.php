<?php


if(isset($_POST['inserir'])){
    require_once "../src/funcoes-fabricantes.php";
    // capturando o valor digitado do nome e sanitizado
    $nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
    // Pode ser assim também:
    // $nome = filter_var($_POST['nome'],FILTER_SANITIZE_SPECIAL_CHARS);

    inserir_fabricantes($conexao, $nome);

    /* Redirecionamento */
    header("location:visualizar.php");
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes | INSERT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">   
    <link rel="stylesheet" href="../css/estilos.css">

</head>
<body>
    <main>
    <h1 class="text-center">Fabricantes | INSERT - <a href="../index.php">Home</a></h1>
    <hr>

    <form action="" method="post"  class="row g-3 container-lg m-auto p-5 ">
        <div class="col-md-12">
            <p>
                <label for="nome"  class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </p>
        </div>

        <button type="submit" name="inserir" class="btn">Inserir Fabricante</button>
        
        <p><a href="visualizar.php" class="btn">Voltar</a></p>
    </form>

    <hr>
    
    </main>
</body>
</html>