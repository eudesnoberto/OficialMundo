<?php 
namespace app\controllers;
class Question
{
    public function index()
    {
    	return [
    		'view' => 'question',
    		'data' => ['title' => 'Dados']
    	];
    }
}
