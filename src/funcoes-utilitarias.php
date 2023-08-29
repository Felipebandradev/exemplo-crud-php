<?php


function formatar_preco( float $precos):string {
   $preco_formatado = "R$ ".number_format($precos,2,",",".");
   return $preco_formatado;
};

// function conta_preco(float $preco_produto, int $quantidade_estoque)  {
//     $total = $preco_produto * $quantidade_estoque;
//     return $total;
// };