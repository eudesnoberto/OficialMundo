<?php

namespace app\controllers;

class verProduto{


    function produto($params){
     $produto = findBy('produtos', 'id', $params['produtos'], '*' );
     $nomeProduto = $produto->nome_linha_pro;

    $uri = $params['produtos'];

     read('produtos', '*');
     where('id', $uri);
     $produtos = execute();

         return [
        'view' => 'produtos',
        'data' => ['title' => $nomeProduto, 'produto' => $produtos]
    ];

    }
}
