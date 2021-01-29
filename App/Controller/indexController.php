<?php

namespace App\Controller;

class indexController{
    
    protected $view;

    public function index(){
        $this->render('login/index.php');
        $this->content();
    }
    public function error(){
        $this->render('404NotFound/404.php');
        $this->content();
    }
    function validateUser(){
       $this->render('login/verifica_user.php');
       $this->content();
    }
    public function content(){

        include $this->view;

    }

    public function render($view){

        $this->view = 'src//pages//'.$view;

    }

}


?>