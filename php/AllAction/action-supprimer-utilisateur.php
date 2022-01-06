<?php
session_start();
if(!isset($_SESSION['user'])){
   $_SESSION["error"]="Veuillez d'abord vous connectés";
}
$errors=[];
include_once("../../DBConnection/Connect.php");
$errors=[];
if(isset($_GET['Id'])){
    $Id = htmlentities(htmlspecialchars($_GET['Id']));
    $queryPrepare=$pdo->prepare("DELETE FROM Utilisateur WHERE Id=:Id"); 

    $response=$queryPrepare->execute([
        'Id'=>$Id,
    ]);
 }

 $_SESSION["success"]="Utilisateur enregistré avec SUCCES";
 header('Location:../Afficher-Utilisateurs.php');
?>
