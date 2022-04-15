<?php

namespace app\controllers;

class Produtos{


    function produtoValor(){

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);

        $info = 'Preço do '.$produto.' Atualizado Para R$ '.number_format($preco,2,",",".").' Com Sucesso!';



        $pdo = connect();
        $stmt = $pdo->prepare("UPDATE produtos SET valor_linha_pro = ? WHERE id = $id ");
        $stmt->bindValue(1, $preco);
        $stmt->execute();

        return setMessageAndRedirectProduto('message', $info, '/dashboard/produtos');

    }

    function produtoEditPage{
    


        $idProduto = filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_STRING);
        //primeiro parametro é a tabela e o segundo parametro as colunas
        read('produto', 'id, valor, maquina, sistema, noteiro, data');


        where('maquina', $idProduto);
        order( 'sistema');
        $subcaregorias = execute();

        return [
            'view' => 'produto',
            'data' => ['title' => 'Login']
        ];
    

    }

    function produtoAdd(){


        $produto = "Aqua Power";
        $pasta = mkdir(__DIR__.'/imagens/'.$produto.'/', 0777, true);

        $diretorio = 'imagens/'.$produto.'/';

        if(!is_dir($diretorio)){
            echo "Pasta $diretorio nao existe";
        }else{
            $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
            for ($controle = 0; $controle < count($arquivo['name']); $controle++){

                $destino = $diretorio."/".$arquivo['name'][$controle];
                if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
            //echo "Upload realizado com sucesso<br>"; 

                    echo $arquivo['name'][$controle].'<br>';

                }else{
                    echo "Erro ao realizar upload";
                }
            }
        }


        $id_produto_user = $_POST['id_produto_user'];
        $google_id = $_POST['google_id'];
        $gtin = $_POST['gtin'];
        $categoria_id = $_POST['categoria_id'];
        $nome_linha_pro = $_POST['nome_linha_pro'];
        $valor_linha_pro = $_POST['valor_linha_pro'];
        $valor_old_linha_pro = $_POST['valor_old_linha_pro'];
        $descricao_linhaPro = $_POST['descricao_linhaPro'];
        $descricao_prev_linhaPro = $_POST['descricao_prev_linhaPro'];
        $link_ceu = $_POST['link_ceu'];
        $peso = $_POST['peso'];
        $novo = $_POST['novo'];
        $status_linhaPro = $_POST['status_linhaPro'];
        $data_linhaPro = $_POST['data_linhaPro'];



        $pdo = connect();
        $stmt = $pdo->prepare("INSERT INTO produtos  (id_produto_user, google_id, gtin, categoria_id, nome_linha_pro, valor_linha_pro, valor_old_linha_pro, img_linhaPro, descricao_linhaPro, descricao_prev_linhaPro, link_ceu, peso, novo, status_linhaPro, data_linhaPro) VALUES (:id_produto_user, :google_id, gtin, :categoria_id, :nome_linha_pro, :valor_linha_pro, :valor_old_linha_pro, :img_linhaPro, :descricao_linhaPro, :descricao_prev_linhaPro, :link_ceu, :peso, :novo, :status_linhaPro, :data_linhaPro)");

        $stmt->bindValue(':id_produto_user', $id_produto_user);
        $stmt->bindValue(':google_id', $google_id);
        $stmt->bindValue(':gtin', $gtin);
        $stmt->bindValue(':categoria_id', $categoria_id);
        $stmt->bindValue(':nome_linha_pro', $nome_linha_pro);
        $stmt->bindValue(':valor_linha_pro', $valor_linha_pro);
        $stmt->bindValue(':valor_old_linha_pro', $valor_old_linha_pro);
        $stmt->bindValue(':descricao_linhaPro', $descricao_linhaPro);
        $stmt->bindValue(':descricao_prev_linhaPro', $descricao_prev_linhaPro);
        $stmt->bindValue(':link_ceu', $link_ceu);
        $stmt->bindValue(':peso', $peso);
        $stmt->bindValue(':novo', $novo);
        $stmt->bindValue(':status_linhaPro', $status_linhaPro);
        $stmt->bindValue(':data_linhaPro', $data_linhaPro);
        $stmt->execute();
    }
