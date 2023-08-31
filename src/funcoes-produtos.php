<?php

require_once "conecta.php";

function ler_produtos(PDO $conexao):array  {
    // $sql = "SELECT nome,preco,quantidade FROM produtos ORDER BY nome " ;
     $sql = "SELECT 
                produtos.id ,
                produtos.nome AS produto,
                produtos.preco,
                produtos.quantidade,
                fabricantes.nome AS fabricante,
                (produtos.preco*produtos.quantidade) AS total,
                produtos.descricao
             FROM produtos INNER JOIN fabricantes 
             ON produtos.fabricante_id = fabricantes.id
             ORDER BY produto";

     try {
        $consulta = $conexao->prepare($sql) ;
        $consulta->execute();
       $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar produtos".$erro->getMessage());
    } 

    return $resultado;
}

function inserirProduto(
    PDO $conexao, string $nome, float $preco, int $quantidade, int $fabricanteid,string $descricao ):void {
  
      $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id) VALUES(:nome, :preco, :quantidade, :descricao, :fabricanteid)";
  
      try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome",$nome,PDO::PARAM_STR);

        // Ao trabalhar com valores "quebrados" para os parâmetros nomeados, você deve usar a constante PARAM_STR. No momento, não há outra forma no PDO de lidar com valores deste tipo devido aos diferentes tipos de dados que cada Banco de Dados suporte.
        $consulta->bindValue(":preco",$preco,PDO::PARAM_STR);
        $consulta->bindValue(":quantidade",$quantidade,PDO::PARAM_INT);
        $consulta->bindValue(":descricao",$descricao,PDO::PARAM_STR);
        $consulta->bindValue(":fabricanteid",$fabricanteid,PDO::PARAM_INT);
        $consulta->execute();

      } catch(Exception $erro){
            die("Erro ao inserir: ".$erro->getMessage());
      }
  }


  function ler_um_produto(PDO $conexao, int $id) :array {
    $sql = "SELECT * FROM produtos WHERE id = :id";

    try {
        $query = $conexao->prepare($sql);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
    }

    return $resultado;
  }

  function atualizar_produto(
    PDO $conexao, 
    int $id ,
    string $nome, 
    float $preco, 
    int $quantidade, 
    string $descricao, 
    int $fabricanteid
  ) :void {
         $sql = "UPDATE produtos SET 
                  nome = :nome, 
                  preco = :preco,
                  quantidade = :quantidade,
                  descricao = :descricao,
                  fabricante_id = :fabricante
                  WHERE id = :id";

        try {
           $query = $conexao->prepare($sql);

           $query->bindValue(":id",$id, PDO::PARAM_INT);
           $query->bindValue(":nome",$nome, PDO::PARAM_STR);
           $query->bindValue(":preco",$preco, PDO::PARAM_STR);
           $query->bindValue(":quantidade",$quantidade, PDO::PARAM_INT);
           $query->bindValue(":descricao",$descricao, PDO::PARAM_STR);
           $query->bindValue(":fabricante",$fabricanteid, PDO::PARAM_INT);

           $query->execute();

          } catch (Exception $erro) {
            die("Erro ao atualizar: ".$erro->getMessage());
          }
  }

  function excluir_produto(PDO $conexao, int $id){
      $sql = "DELETE FROM produtos WHERE id = :id";

      try{
          $query = $conexao->prepare($sql);
          $query->bindValue(":id", $id, PDO::PARAM_INT);
          $query->execute();
      } catch (Exception $erro) {
        die("Erro ao deletar: ".$erro->getMessage());
      }
  }