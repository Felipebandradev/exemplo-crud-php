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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">  
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <main>
        <h1 class="text-center">Fabricantes | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
        <h2 class="card-title text-center">Lendo e carregando todos os Fabricantes</h2>

        <p class="text-center"><a class="btn" href="inserir.php">Inserir o Fabricante</a></p>

        <?php if(isset($_GET["status"]) && $_GET["status"] === "sucesso") { ?>
            <h2 style="color: aquamarine;"> Fabricante Atualizado com sucesso</h2>
        <?php } ?>
        
            <h2 class="text-center card-title listasdefab">Lista de Fabricantes: <?=$quantidade?></h2>

        <table class=" table  table-dark table-striped tabela table-hover text-center">
            <thead>
                <tr>
                    <th >Id</th>
                    <th >Nome</th>
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
                    <a  href="atualizar.php?id=<?=$fabricante["id"]?>" class="btn">Editar 🖋</a>
                    <a class="excluir btn" href="deletar.php?id=<?=$fabricante["id"]?>" >Excluir 🗑</a>
                </td>
            </tr>   
            <?php }?>
        </table>
    </main>
    <script src="../js/confirma-exclusao.js"></script>
</body>
</html>