<?php 

  include 'App//Controller//indexController.php';
  include 'App//Controller//dashboardController.php';

  $route = new Route;

  class Route{

    private $routes;

    public function __construct()
    {
      $this->initRoutes();
      $this->run($this->getURL());
    }
    
    public function initRoutes(){
<<<<<<< HEAD
      $this->routes['/'] = array('controller' => 'indexController', 'action' => 'index');
=======
>>>>>>> 5f81438aaf2a0ff70faead1792d748c43c0cbb68
      $this->routes['/login'] = array('controller' => 'indexController', 'action' => 'index');
      $this->routes['/dashboard'] = array('controller' => 'Dashboard', 'action' => 'index');
      $this->routes['/logout'] = array('controller' => 'Dashboard', 'action' => 'logout');
      $this->routes['/dashboard/acessdanied'] = array('controller' => 'Dashboard', 'action' => 'AcessDanied');
      $this->routes['/404'] = array('controller' => 'indexController', 'action' => 'error');
<<<<<<< HEAD
      $this->routes['/login/forgot/password'] = array('controller' => 'indexController', 'action' => 'forgotPassword');
=======
>>>>>>> 5f81438aaf2a0ff70faead1792d748c43c0cbb68
    }

    protected function run($url){
      if(array_key_exists($url, $this->routes)){
        $class = "\\App\\Controller\\". $this->routes[$url]['controller'];
        $controller = new $class;
        $action = $this->routes[$url]['action'];
        $controller->$action();
      }else{
        header('location:/404');
      }
    }

    public function getURL(){
      return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }


  }


?>