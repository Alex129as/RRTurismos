<?php
    header('Content-Type: application/json');
    $pdo = require_once('./../../Connection/connection.php');
    $user = $_POST['user'];
    $cpf = $_POST['cpf'];
    $token = $_POST['token'];
    $newPassword = md5($_POST['senha']);

    function resetPassword($pdo, $user, $cpf, $token,  $newPassword){
        try{
    
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resetPassword = "UPDATE usuario SET senha = '$newPassword' WHERE cpf = '$cpf' AND usuario ='$user' AND token = '$token';";

            $stmt = $pdo->prepare($resetPassword);
            $stmt->execute();

            if($stmt->rowCount() === 1){
                echo json_encode("success"); 
            }else {
                echo json_encode("error"); 
            }
        }catch ( PDOException $e ){

            echo json_encode($e->getMessage());

        }
    }
  resetPassword($pdo, $user, $cpf, $token, $newPassword);

?>