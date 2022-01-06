<?php
session_start();
if(!isset($_SESSION['user'])){
   $_SESSION["error"]="Veuillez d'abord vous connectés";
}
$errors=[];
include_once("../../DBConnection/Connect.php");
if(isset($_POST['submit'])){

   $Id_Etudiant = htmlentities($_POST['Id_Etudiant']);
   $Id_Cours = htmlentities($_POST['Id_Cours']);
   $Note = htmlentities($_POST['Note']);
   $AnneeAcademique = htmlentities($_POST['AnneeAcademique']);
   $Session_notes = htmlentities(trim($_POST['Session_notes']));

   $Id_notes = htmlentities(trim($_POST['Id_notes']));
   
   if(empty($Note) && !preg_match("^[0-9.]{1,3}$",$Note)){
    $errors['Note']="La note doit etre renseigne";
    }
    if(empty($Id_Cours)){
        $errors['Id_Cours']="L'id Cours' doit etre renseigne";
    }
    if(empty($Id_Etudiant)){
        $errors['Id_Etudiant']="L'Id_Etudiant doit etre renseigne";
    }
    if(empty($AnneeAcademique)){
        $errors['AnneeAcademique']="Le AnneeAcademique doit etre renseigne";
    }
    if(empty($Session_notes)){
        $errors['Session_notes']="Session_notes doit etre renseigne";
    }
    
   if(empty($errors)){
        $queryPrepare=$pdo->prepare("UPDATE Notes SET Id_Etudiant=:Id_Etudiant,Id_Cours=:Id_Cours,Note=:Note,AnneeAcademique=:AnneeAcademique,Session_notes=:Session_notes WHERE Id_notes=:Id_notes");
        $queryPrepare->execute([
           'Id_Etudiant'=>$Id_Etudiant,
           'Id_Cours'=>$Id_Cours,
           'Note'=>$Note,
           'AnneeAcademique'=>$AnneeAcademique,
           'Session_notes'=>$Session_notes,
           'Id_notes'=>$Id_notes,
       ]);
       $_SESSION["success"]="Utilisateur enregistré avec SUCCES";
       header('Location:../afficher-notes.php');
   }

}
?>