<?php
session_start();
if(!isset($_SESSION['user'])){
   $_SESSION["error"]="Veuillez d'abord vous connectés";
}
$errors=[];
include_once("../../DBConnection/Connect.php");
if(isset($_POST['submit'])){
   $today = date("ymd");
   $rand = strtoupper(substr(uniqid(sha1(time())),0,3));
   $formid = str_pad($rand,2,STR_PAD_LEFT);
   $Id_Cours = $today.'C'.$formid;

   $Nom_cours = htmlentities(trim($_POST['Nom_cours']));
   $Filiere = htmlentities($_POST['Filiere']);
   $Niveau = htmlentities($_POST['Niveau']);
   $Session_cours = htmlentities($_POST['Session_cours']);
   $Coefficient = htmlentities($_POST['Coefficient']);
   $Professeur_titulaire = htmlentities($_POST['Professeur_titulaire']);
   $Professeur_suppleant = htmlentities($_POST['Professeur_suppleant']);
   $Jours = htmlentities($_POST['Jours']);
   $Heure_debut = htmlentities($_POST['Heure_debut']);
   $Heure_Fin = htmlentities($_POST['Heure_Fin']);
   $Etat = htmlentities($_POST['Etat']);

    if(empty($Nom_cours) && !preg_match("^[a-zA-Z0-9_. ]{2,40}$",$Nom_cours)){
        $errors['Nom_cours']="Le nom cours doit etre renseigne";
    }
    if(empty($Filiere) && !preg_match("^[a-zA-Z ]{2,40}$",$Filiere)){
        $errors['Filiere']="Filiere doit etre renseigne";
    }
    // 
    if(empty($Niveau) && !preg_match("^[a-zA-Z0-9 ]{2,40}}$",$Niveau)){
        $errors['Niveau']="Niveau doit etre renseigne";
    }
    if(empty($Session_cours)){
        $errors['Session_cours']="Session_cours doit etre renseigne";
    }
    if(empty($Coefficient) && !preg_match("^[0-9]{1,7}$",$Coefficient)){
        $errors['Coefficient']="Filiere doit etre renseigne";
    }
    if(empty($Professeur_titulaire) && !preg_match("^[a-zA-Z ]{2,40}$",$Professeur_titulaire)){
        $errors['Professeur_titulaire']="Professeur titulaire doit etre renseigne";
    }
    if(empty($Jours)){
        $errors['Jours']="Jours doit etre renseigne";
    }
    if(empty($Heure_debut) && !preg_match("^[a-zA-Z0-9-_:]{2,20}$",$Heure_debut)){
        $errors['Heure_debut']="Heure debut doit etre renseigne";
    }
    if(empty($Heure_Fin) && !preg_match("^[a-zA-Z0-9-_:]{2,20}$",$Heure_Fin)){
        $errors['Heure_Fin']="Heure Fin doit etre renseigne";
    }
    if(empty($Etat)){
        $errors['Etat']="Etat doit etre renseigne";
    }
    
   if(empty($errors)){
        $queryPrepare=$pdo->prepare("INSERT INTO cours(Id_Cours, Nom_cours, Filiere, Niveau, Session_cours, Coefficient, Professeur_titulaire, Professeur_suppleant, Jours, Heure_debut, Heure_Fin, Etat) VALUES (:Id_Cours,:Nom_cours,:Filiere,:Niveau,:Session_cours,:Coefficient,:Professeur_titulaire,:Professeur_suppleant,:Jours,:Heure_debut,:Heure_Fin,:Etat)");
        $queryPrepare->execute([
           'Id_Cours'=>$Id_Cours,
           'Nom_cours'=>$Nom_cours,
           'Filiere'=>$Filiere,
           'Niveau'=>$Niveau,
           'Session_cours'=>$Session_cours,
           'Coefficient'=>$Coefficient,
           'Professeur_titulaire'=>$Professeur_titulaire,
           'Professeur_suppleant'=>$Professeur_suppleant,
           'Jours'=>$Jours,
           'Heure_debut'=>$Heure_debut,
           'Heure_Fin'=>$Heure_Fin,
           'Etat'=>$Etat,
       ]);
       $_SESSION["success"]="Utilisateur enregistré avec SUCCES";
       header('Location:../afficher-cours.php');
   }

}
?>