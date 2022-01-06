<?php
session_start();
if(!isset($_SESSION['user'])){
   $_SESSION["error"]="Veuillez d'abord vous connectés";
}
$errors=[];
include_once("../../DBConnection/Connect.php");

if(isset($_POST['submit'])){
    $Nom = htmlentities(trim($_POST['Nom']));
    $Prenom = htmlentities(trim($_POST['Prenom']));
    $Poste = htmlentities($_POST['Poste']);
    $Pseudo = htmlentities($_POST['Pseudo']);
    $Passworde = htmlentities($_POST['Passworde']);
    $Etat = htmlentities($_POST['Etat']);
    $Modules = htmlentities($_POST['Modules']);
    $Id = htmlentities($_POST['Id']);

    if(empty($errors)){
        $queryPrepare=$pdo->prepare("UPDATE Utilisateur SET Nom=:Nom, Prenom=:Prenom,Poste=:Poste,Pseudo=:Pseudo,Passworde=:Passworde,Etat=:Etat,Modules=:Modules WHERE Id=:Id");
        $queryPrepare->execute([
            'Nom'=>$Nom,
            'Prenom'=>$Prenom,
            'Poste'=>$Poste,
            'Pseudo'=>$Pseudo,
            'Passworde'=>$Passworde,
            'Etat'=>$Etat,
            'Modules'=>$Modules,
            'Id'=>$Id,
            
        ]);
        $_SESSION["success"]="Utilisateur enregistré avec SUCCES";
        header('Location:../Afficher-Utilisateurs.php');
    if(isset($_POST['Etat'])){
        $Etat = htmlentities($_POST['Etat']);
    }
    else{
        $errors['Etat']="L'etat doit etre renseigne";
    }

    if(empty($Nom)){
        $errors['Nom']="L'annee debut d'utilisateur doit etre renseigne";
    }
    
    }
}
?>