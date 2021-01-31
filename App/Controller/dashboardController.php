<?php

namespace App\Controller;

class Dashboard{
    
    protected $view;

    public function index(){
        $this->render('dashboard/index.php');
        $this->content();
    }

    public function logout(){
        $this->renderFunctions('logout/index.php');
        $this->content();
    }
    public function AcessDanied(){
        $this->render('404NotFound/404.php');
        $this->content();
    }
    public function content(){

        include $this->view;

    }
    public function render($view){

        $this->view = 'src//pages//'.$view;

    }
    public function renderFunctions($view){

        $this->view = 'functions//'.$view;

    }

}

?>
