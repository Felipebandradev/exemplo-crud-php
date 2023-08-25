<?php
require_once "../src/funcoes-fabricantes.php";
/* Obtendo de sanitizando o valor vindo da url  (link dinâmico) */
$id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT);

$fabricante = ler_um_fabricante($conexao, $id);

if (isset($_POST["atualizar"])){
    $nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
    atualizar_fabricante($conexao,$nome,$id);

    header("location:visualizar.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes | Atualização</title>

    <style>
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


    </style>
</head>
<body>
    <main>
    <h1>Fabricantes | SELECT/UPDATE - <a href="../index.php">Home</a></h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$fabricante["id"]?>">
        <p>
            <label for="nome">Nome:</label>
            <input value="<?=$fabricante["nome"]?>" type="text" name="nome" id="nome" required> 
        </p>

        <button type="submit" name="atualizar">atualizar Fabricante</button>
    </form>

    <hr> 
    <p><a href="visualizar.php">Voltar</a></p>
    </main>
</body>
</html>