<?php
  header('Content-Type: application/json');
  $pdo = require_once('./../../Connection/connection.php');
  $user = $_POST['user'];
  function ValidaUser($pdo, $user){
    try{
    
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $BuscaUser = "SELECT usuario FROM USUARIO WHERE usuario = '$user'";

      $stmt = $pdo->prepare($BuscaUser);
      $stmt->execute();
      $Array = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      echo json_encode($Array); 

    }catch ( PDOException $e ){

      echo json_encode($e->getMessage());

    }
  }
  ValidaUser($pdo, $user);
?>