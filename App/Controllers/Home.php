<?php

namespace App\Controllers;

class Home
{
    
    private $dados;

    public function onShow() {

        if(isset($_GET['produto'])) {
            $a = $_GET['produto'] ;
        }

        $visualizarLogin = new \App\Models\Produtos();//Instancia o Model Produtos

        $this->dados['produtos'] = $visualizarLogin->get_prod();//Busca os Produtos

        $this->dados['cores'] = $visualizarLogin->get_cor(); 

       $carregarView = new \Core\ConfigView("Views/home", $this->dados);//Carrega a View Home
       $carregarView->renderizar();
    }


    public function onInsert() {
       
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

      
        $visualizarLogin = new \App\Models\Produtos();//Instancia o Model Produtos

        $visualizarLogin->insertProduto($this->dados);        

        $this->dados['produtos'] = $visualizarLogin->get_prod();//Busca os Produtos

        $this->dados['cores'] = $visualizarLogin->get_cor(); 

       $carregarView = new \Core\ConfigView("Views/home", $this->dados);//Carrega a View Home
       $carregarView->renderizar();
        
    }

    public function onUpdate() {
       
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      
        $visualizarLogin = new \App\Models\Produtos();//Instancia o Model Produtos

        $visualizarLogin->updateProduto($this->dados);

        $this->dados['produtos'] = $visualizarLogin->get_prod();//Busca os Produtos

        $this->dados['cores'] = $visualizarLogin->get_cor(); 

       $carregarView = new \Core\ConfigView("Views/home", $this->dados);//Carrega a View Home
       $carregarView->renderizar();
        
    }


    public function onDelete() {
       
        $this->dados['id'] =  $_GET["id"]? $_GET["id"]:"-1";
      
        $visualizarLogin = new \App\Models\Produtos();//Instancia o Model Produtos

        
        if($this->dados){
            $visualizarLogin->deleteProduto($this->dados);
           }
   
        $this->dados['produtos'] = $visualizarLogin->get_prod();//Busca os Produtos

        $this->dados['cores'] = $visualizarLogin->get_cor(); 

       $carregarView = new \Core\ConfigView("Views/home", $this->dados);//Carrega a View Home
       $carregarView->renderizar();
        
    }


    public function onEdit() {
       
        $this->dados['id'] =  $_GET["id"]? $_GET["id"]:"-1";
      
        $visualizarLogin = new \App\Models\Produtos();//Instancia o Model Produtos

        
        if($this->dados){
            $this->dados['produtoEdit'] = $visualizarLogin->selectProduto($this->dados);

        }
   
        $this->dados['produtos'] = $visualizarLogin->get_prod();//Busca os Produtos

        $this->dados['cores'] = $visualizarLogin->get_cor(); 

       $carregarView = new \Core\ConfigView("Views/home", $this->dados);//Carrega a View Home
       $carregarView->renderizar();
        
    }
}
