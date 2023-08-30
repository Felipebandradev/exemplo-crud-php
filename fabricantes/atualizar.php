<?php
require_once "../src/funcoes-fabricantes.php";
/* Obtendo de sanitizando o valor vindo da url  (link dinâmico) */
$id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT);

$fabricante = ler_um_fabricante($conexao, $id);

if (isset($_POST["atualizar"])){
    $nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
    atualizar_fabricante($conexao,$nome,$id);

    header("location:visualizar.php?status=sucesso");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes | Atualização</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">  
    <link rel="stylesheet" href="../css/estilos.css">

    <!-- <style>
                body { 
            font-family: monospace;
            background-color: #9966cc;
        }


        h1, h2, h1 a{
            color: #f0ddee;
            text-align: center;
        }

        p{
            font-size: 1rem; 
            padding: 2rem;
        }

        p a{
        text-decoration: none; 
        color:#642764;
        background-color: #e0bcdd;
        padding: 1rem;
        border-radius: 15px;
        }

        form{
            width: 500px;
            margin: auto;
            
        }

        input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        }

        label{
            color: #f0ddee;
            font-size: 2rem;
        }

        button {
        background-color: #e0bcdd;
        border: none;
        color: #642764;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
        width: 100%;
        }


    </style> -->
</head>
<body>
    <main>
    <h1 class="text-center">Fabricantes | SELECT/UPDATE - <a href="../index.php">Home</a></h1>
    <hr>

    <form action="" method="post" class="row g-3 container-lg m-auto p-5 ">
        <input type="hidden" name="id" value="<?=$fabricante["id"]?>">
        <div class="col-md-12">
            <p>
                <label for="nome"  class="form-label">Nome:</label>
                <input value="<?=$fabricante["nome"]?>" type="text" name="nome" id="nome" class="form-control" required>
            </p>
        </div>

        <button type="submit" name="atualizar" class="btn">atualizar Fabricante</button>
        
        <p><a href="visualizar.php" class="btn">Voltar</a></p>
    </form>

    <hr> 
   
    </main>
</body>
</html>