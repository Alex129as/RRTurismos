<?php
  header('Content-Type: application/json');
  $pdo = require_once('./../../Connection/connection.php');
  $user = $_POST['user'];
  $cpf = $_POST['cpf'];
  function ValidaUser($pdo, $user, $cpf){
    try{
    
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $BuscaUser = "SELECT usuario, cpf FROM USUARIO WHERE usuario = '$user' AND cpf = '$cpf';";

      $stmt = $pdo->prepare($BuscaUser);
      $stmt->execute();
      $Array = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      echo json_encode($Array); 

    }catch ( PDOException $e ){

      echo json_encode($e->getMessage());

    }
  }
  ValidaUser($pdo, $user, $cpf);
?>