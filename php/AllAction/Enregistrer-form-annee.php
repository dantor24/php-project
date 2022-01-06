<?php
session_start();
if(!isset($_SESSION['user'])){
   $_SESSION["error"]="Veuillez d'abord vous connectés";
}
$errors=[];
include_once("../../DBConnection/Connect.php");
if(isset($_POST['submit'])){
    // Variable de l'annee de l'academiques
   $Annee_debut = htmlentities($_POST['Annee_debut']);
   $Annee_fin = $Annee_debut + 1;

   $Date_deb = htmlentities($_POST['Date_debut']);
   $DateSe = date("m-d", strtotime($Date_deb));
   $Date_debut = $Annee_debut.'-'.$DateSe;

   $Date_F = htmlentities($_POST['Date_fin']);
   $DateFn = date("m-d", strtotime($Date_F));
   $Date_fin = $Annee_fin.'-'.$DateFn;

   $AnneeAcademique = $Annee_debut.'-'.$Annee_fin;
   $Etat = htmlentities(trim($_POST['Etat']));

//    Permet de gerer les contraintes dans le systeme "^[0-9.]{1,3}$"
    if(empty($Annee_debut) && !preg_match("^[0-9]{4}$",$Annee_debut)){
        $errors['Annee_debut']="L'annee debut doit etre renseigne";
    }
    if(empty($Annee_fin) && !preg_match("^[0-9]{4}$",$Annee_fin)){
        $errors['Annee_fin']="L'annee fin doit etre renseigne";
    }
    if(empty($Date_debut)){
        $errors['Date_debut']="La date debut doit etre renseigne";
    }
    if(empty($Date_fin) && ($Date_fin<$Date_debut)){
        $errors['Date_fin']="La date fin doit etre renseigne";
    }

   if(empty($errors)){
       $queryPrepare=$pdo->prepare("INSERT INTO Annee_academique(Annee_debut,Annee_fin,Date_debut,Date_fin,AnneeAcademique,Etat) VALUES (:Annee_debut,:Annee_fin,:Date_debut,:Date_fin,:AnneeAcademique,:Etat)");
       $queryPrepare->execute([
           'Annee_debut'=>$Annee_debut,
           'Annee_fin'=>$Annee_fin,
           'Date_debut'=>$Date_debut,
           'Date_fin'=>$Date_fin,
           'AnneeAcademique'=>$AnneeAcademique,
           'Etat'=>$Etat
       ]);
       $_SESSION["success"]="Utilisateur enregistré avec SUCCES";
       header('Location:../modifier-annee-academique.php');
   }

}
?>