<?php


if(isset($_POST['inserir'])){
   
    // capturando o valor digitado do nome e sanitizado
    $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
    // Pode ser assim também:
    // $nome = filter_var($_POST['nome'],FILTER_SANITIZE_SPECIAL_CHARS);
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes | INSERT</title>
</head>
<body>
    <main>
    <h1>Fabricantes | INSERT - <a href="../index.php">Home</a></h1>
    <hr>

    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </p>

        <button type="submit" name="inserir">Inserir Fabricante</button>
    </form>
    </main>
</body>
</html>