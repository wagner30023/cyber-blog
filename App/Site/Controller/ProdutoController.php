<?php

namespace App\Site\Controller;

use App\Core\Controller;;

class ProdutoController extends Controller
{
    public function index()
    {
  
    }

    public function ver($idProduto,$quantidadeItem)
    {
         $this->view('produto.index',[
            'idProduto' => $idProduto,
            'quantidadeDeProduto' => $quantidadeItem
        ]);
    }
}