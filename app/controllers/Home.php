<?php



namespace app\controllers;
class Home

{
    public function index($params): array
    {

        read('produtos', '*');
        where('id', 602);
        $produtos1 = execute();

        read('produtos', '*');
        where('categoria_linha_pro', 4);
        order( 'nome_linha_pro');
        limit('10');
        $produtosA = execute();

        read('produtos', '*');
        where('categoria_linha_pro', 3);
        order( 'nome_linha_pro');
        limit('10');
        $produtosB = execute();

        read('produtos', '*');
        where('categoria_linha_pro', 7);
        order( 'nome_linha_pro');
        limit('10');
        $produtosC = execute();

        read('produtos', '*');
        where('todos', 1);
        order( 'nome_linha_pro');
        limit('20');
        $produtosD = execute();


        read('produtos', '*');
        where('natural_gelado', 1);
        order( 'nome_linha_pro');
        limit('12');
        $produtosE = execute();


        read('produtos', '*');
        where('natural_gelado', 2);
        order( 'nome_linha_pro');
        limit('20');
        $produtosF = execute();

        return [
          'view' => 'home',
          'data' => ['title' => 'Água Alcalina - Oficial Mundo Alcalina', 'produtoA' => $produtosA, 'produtoB' => $produtosB, 'produtoC' => $produtosC, 'produtoD' => $produtosD, 'produtoE' => $produtosE, 'produtoF' => $produtosF, 'produtos1' => $produtos1]
      ];

  }
}

