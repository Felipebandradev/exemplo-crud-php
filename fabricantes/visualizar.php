<?php
/* Inportando as Funções de manipulação de fabricantes */
require_once "../src/funcoes-fabricantes.php";

/* Guardando o retorno/resultado da função ler fabricantes */
$lista_de_fabricantes = ler_fabricantes($conexao);

$quantidade = count($lista_de_fabricantes);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Visualização</title>

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
    text-align: center;
    font-size: 1rem; 
    padding: 2rem;
}

td a{
    color:darkviolet;
    text-decoration: none;
}
td a:hover{
    color:mediumorchid;
    text-decoration: none;
}
p a{
   text-decoration: none; 
   color:#642764;
   background-color: #e0bcdd;
   padding: 2rem;
   border-radius: 15px;
}

tr:nth-child(odd){
    color: #7e2d7e;
    background-color:#e0bcdd;
}    

tr:nth-child(even){ 
    color: #642764;   
    background-color: #f0ddee;
}

table {
    width: 50%;
    margin: auto;
}

tr, caption, h2 {
    text-align: center;
    font-size: 2rem;
}

thead tr th{
    color: honeydew;
    background-color: #ac58aa;
} 
caption {
    border-top-left-radius: 51px  ;
    border-top-right-radius: 51px  ;
    color:white;
    background-color: #993399;
}
</style>
</head>
<body>
    <main>
        <h1>Fabricantes | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
        <h2>Lendo e carregando todos os Fabricantes</h2>

        <p><a href="inserir.php">Inserir o Fabricante</a></p>
        <table>
            <caption>Lista de Fabricantes: <?=$quantidade?></caption>

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th >Operações</th>
                </tr>
            </thead>
            <?php 
            foreach ($lista_de_fabricantes as $fabricante){
            ?>
            <tr>
                <td><?=$fabricante["id"]?></td>
                <td><?=$fabricante["nome"]?></td>
                <td>
                    <a href="atualizar.php?id=<?=$fabricante["id"]?>">Editar 🖋</a>
                    <a href="">Excluir 🗑</a>
                </td>
            </tr>   
            <?php }?>
        </table>
    </main>
</body>
</html>