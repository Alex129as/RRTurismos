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
<<<<<<< HEAD

    public function forgotPassword(){
        $this->render('login/forgotPassword/index.php');
        $this->content();
=======
    function validateUser(){
       $this->render('login/verifica_user.php');
       $this->content();
>>>>>>> 5f81438aaf2a0ff70faead1792d748c43c0cbb68
    }
    public function content(){

        include $this->view;

    }

    public function render($view){

        $this->view = 'src//pages//'.$view;

    }
<<<<<<< HEAD
    public function renderTemplate($view, $template){

        $this->view = 'src//pages//'.$view;
        include 'src//pages//layout//'.$template;

    }

=======
>>>>>>> 5f81438aaf2a0ff70faead1792d748c43c0cbb68

}


?>