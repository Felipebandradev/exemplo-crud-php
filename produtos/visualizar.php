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
            width: 90%;
            margin: auto;
           
        }

        .produto{
            color: aliceblue;
             width: 40%; 
            background-color: #ab212e;
            border: 1px #3d761d solid;
            padding: 1rem;
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
            
            <article class="produto">
                <h3>Nome do Produto: ...</h3>
                <p><b>Preço: </b>...</p>
                <p><b>Quantidade: </b>...</p>
            </article>

            <article class="produto">
                <h3>Nome do Produto: ...</h3>
                <p><b>Preço: </b>...</p>
                <p><b>Quantidade: </b>...</p>
            </article>
           

        </section>
    </main>
</body>
</html>