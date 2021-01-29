<?php
  header('Content-Type: application/json');
  $pdo = require_once('./../../../Connection/connection.php');
  function contUSer($pdo){
    try{
    
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $BuscaUser = "SELECT COUNT(*) AS VALUE FROM USUARIO WHERE status <> 'I' ";

      $stmt = $pdo->prepare($BuscaUser);
      $stmt->execute();
      $Array = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      echo json_encode($Array); 

    }catch ( PDOException $e ){

      echo json_encode($e->getMessage());

    }
  }
  contUSer($pdo);
?>