<?php 
namespace app\controllers;
class Subcategorias
{

    public function index()
    {
        $caregorias = filter_input(INPUT_GET, 'caregorias', FILTER_SANITIZE_STRING);
        //primeiro parametro é a tabela e o segundo parametro as colunas
        read('valores', 'id, valor, maquina, sistema, noteiro, data');


        where('maquina', $caregorias);
        order( 'sistema');
        $subcaregorias = execute();
        echo json_encode($subcaregorias);
    }
}