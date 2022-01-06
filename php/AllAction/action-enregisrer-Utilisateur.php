<?php
session_start();
if(!isset($_SESSION['user'])){
   $_SESSION["error"]="Veuillez d'abord vous connectés";
}
$errors=[];
include_once("../../DBConnection/Connect.php");
if(isset($_POST['submit'])){
   $Nom = htmlentities($_POST['Nom']);
   $Prenom = htmlentities($_POST['Prenom']);
   $Poste = htmlentities($_POST['Poste']);
   $Pseudo = htmlentities($_POST['Pseudo']);
   $Passworde = htmlentities($_POST['Passworde']);
   $Etat = htmlentities($_POST['Etat']);
   $Modules = htmlentities($_POST['Modules']);

//    $AnneeAcademique = htmlentities($_POST['AnneeAcademique']);
   if(isset($_POST['Etat'])){
       $Etat = htmlentities($_POST['Etat']);
   }
   else{
       $errors['Etat']="L'etat doit etre renseigne";
   }

   if(empty($Nom)){
       $errors['Nom']="Le nom  d'utilisateur doit etre renseigne";
   }
   if(empty($errors)){
       $queryPrepare=$pdo->prepare("INSERT INTO Utilisateur(Nom,Prenom,Poste,Pseudo,Passworde,Etat,Modules) VALUES (:Nom,:Prenom,:Poste,:Pseudo,:Passworde,:Etat,:Modules)");
       $queryPrepare->execute([
           'Nom'=>$Nom,
           'Prenom'=>$Prenom,
           'Poste'=>$Poste,
           'Pseudo'=>$Pseudo,
           'Passworde'=>$Passworde,
           'Etat'=>$Etat,
           'Modules'=>$Modules
       ]);
       $_SESSION["success"]="Utilisateur enregistré avec SUCCES";
       
   }
   header('Location:../Afficher-Utilisateurs.php');

}
?>