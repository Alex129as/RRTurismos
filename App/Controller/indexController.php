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

    public function forgotPassword(){
        $this->render('login/forgotPassword/index.php');
        $this->content();
    }
    public function content(){

        include $this->view;

    }

    public function render($view){

        $this->view = 'src//pages//'.$view;

    }
    public function renderTemplate($view, $template){

        $this->view = 'src//pages//'.$view;
        include 'src//pages//layout//'.$template;

    }


}


?>