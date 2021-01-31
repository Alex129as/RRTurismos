<?php
  header('Content-Type: application/json');
  $pdo = require_once('./../../Connection/connection.php');
  $user = $_POST['user'];
  $senha = md5($_POST['password']);

    try{
    
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $BuscaUser = "SELECT * FROM USUARIO WHERE usuario = '$user' AND senha = '$senha';";
        $stmt = $pdo->prepare($BuscaUser);
        $stmt->execute();
        
        if($stmt->rowCount() === 1):

            $Array = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($Array as $key => $Array): 
                session_start();
                $_SESSION['User'] = $Array['usuario'];
                $_SESSION['UserID'] = $Array['id'];
                $_SESSION['NomeUser'] = $Array['nome'];
                $_SESSION['TypeUser'] = $Array['tipouser'];
                $_SESSION['StatusUser'] = $Array['status'];
                $_SESSION['TokenUser'] = $Array['token'];
            endforeach;

            echo json_encode("login_checked");
        else: 

            echo json_encode("login_onchecked");

        endif; 

    }catch ( PDOException $e ){

        echo json_encode("ERROR: " . $e->getMessage()."<br>"
            ."Tipo do Erro: " . $e->getCode()); 

    }

?>