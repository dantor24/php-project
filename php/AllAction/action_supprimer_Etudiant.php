<?php
session_start();
if(!isset($_SESSION['user'])){
   $_SESSION["error"]="Veuillez d'abord vous connectés";
}
$errors=[];
include_once("../../DBConnection/Connect.php");
$errors=[];
if(isset($_GET['id'])){
    $id = htmlentities(htmlspecialchars($_GET['id']));
    $queryPrepare=$pdo->prepare("DELETE FROM dossieredu WHERE id=:id"); 

    $response=$queryPrepare->execute([
        'id'=> $id,
    ]);
 }

 $_SESSION["success"]="Utilisateur enregistré avec SUCCES";
 header('Location:../Afficher-Etudiant.php');
?>