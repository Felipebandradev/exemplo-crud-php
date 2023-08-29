<?php


function formatar_preco( float $precos):string {
   $preco_formatado = "R$ ".number_format($precos,2,",",".");
   return $preco_formatado;
};