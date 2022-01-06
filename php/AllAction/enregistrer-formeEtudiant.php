<?php
session_start();
if(!isset($_SESSION['user'])){
   $_SESSION["error"]="Veuillez d'abord vous connectés";
}
$errors=[];
include_once("../../DBConnection/Connect.php");
if(isset($_POST['submit'])){
   $today = date("ymd");
   $rand = strtoupper(substr(uniqid(sha1(time())),0,2));
   $formid = str_pad($rand,2,STR_PAD_LEFT);
   $Id_Etudiant = $today.'-'.$formid;

   $Nom = htmlentities(trim($_POST['Nom']));
   $Prenom = htmlentities($_POST['Prenom']);
   $Sexe = htmlentities($_POST['Sexe']);
   $Adresse = htmlentities($_POST['Adresse']);
   $Lieu_de_naissance = htmlentities($_POST['Lieu_de_naissance']);
   $Date_de_naissance = htmlentities($_POST['Date_de_naissance']);
   $Telephone = htmlentities($_POST['Telephone']);
   $Email = htmlentities($_POST['Email']);
   $Filiere = htmlentities($_POST['Filiere']);
   $Niveau = htmlentities($_POST['Niveau']);
   $Nif_Cin = htmlentities($_POST['Nif_Cin']);
   $Personne_de_reference = htmlentities($_POST['Personne_de_reference']);
   $Telephone_personne_reference = htmlentities($_POST['Telephone_personne_reference']);
   $Photo = $_FILES['Photo']['name'];
   $fichierTempo = $_FILES['Photo']['tmp_name'];
   move_uploaded_file($fichierTempo, './images/'.$Photo);
   $Annee_Academique = htmlentities($_POST['Annee_Academique']);
   $Etat = htmlentities($_POST['Etat']);
   $Memo = htmlentities($_POST['Memo']);

//    Permet de gerer les contraintes dans le systeme
if(empty($Nom) && !preg_match("^[a-zA-Z ]{2,40}$",$Nom)){
    $errors['Nom']="Le Nom doit etre renseigne";
}
if(empty($Prenom) && !preg_match("^[a-zA-Z ]{2,40}$",$Prenom)){
    $errors['Prenom']="Prenom doit etre renseigne";
}
if(empty($Sexe)){
    $errors['Sexe']="Le Sexe doit etre renseigne";
}
if(empty($Adresse) && !preg_match("^[a-zA-Z0-9-_. ]{2,40}$",$Adresse)){
    $errors['Adresse']="L'adresse' doit etre renseigne";
}
if(empty($Telephone) && !preg_match("^[a-zA-Z ]{2,40}$",$Telephone)){
    $errors['Telephone']="Le telephone doit etre renseigne";
}
// -------------------
if(empty($Lieu_de_naissance) && !preg_match("^[a-zA-Z0-9-_. ]{2,40}$",$Lieu_de_naissance)){
    $errors['Lieu_de_naissance']="Le lieu de naissance doit etre renseigne";
}
if(empty($Date_de_naissance)){
    $errors['Date_de_naissance']="La date de naissance doit etre renseigne";
}
if(empty($Niveau) && !preg_match("^[a-zA-Z1-4-_ ]{2,20}$",$Niveau)){
    $errors['Niveau']="Le niveau doit etre renseigne";
}
if(empty($Personne_de_reference) && !preg_match("^[a-zA-Z ]{2,40}$",$Cours_a_enseigner)){
    $errors['Personne_de_reference']="Personne_de_reference enseigner doit etre renseigne";
}
// 
if(empty($Filiere) && !preg_match("^[a-zA-Z1-9-_ ]{2,20}$",$Filieres_affectes)){
    $errors['Filiere']="Filieres affectes doit etre renseigne";
}
if(empty($Email) && !preg_match("^[a-zA-Z0-9-_@.]{6,40}$",$Email)){
    $errors['Email']="L'Email' doit etre renseigne";
}
if(empty($Nif_Cin) && !preg_match("^[0-9-]{10,13}$",$Nif_Cin)){
    $errors['Nif_Cin']="Nif/Cin doit etre renseigne";
}
if(empty($Etat)){
    $errors['Etat']="L'Etat' doit etre renseigne";
}
if(empty($Memo) && !preg_match("^[a-zA-Z0-9-_.!?$,/ ]{3,13}$",$Memo)){
    $errors['Memo']="Memo doit etre renseigne";
}

   if(empty($errors)){
       $queryPrepare=$pdo->prepare("INSERT INTO DossierEdu(Id_Etudiant,Nom,Prenom,Sexe,Adresse,Lieu_de_naissance,Date_de_naissance,
       Telephone,Email,Filiere,Niveau,Nif_Cin,Personne_de_reference,Telephone_personne_reference,Photo,Annee_Academique,
       Etat,Memo) VALUES (:Id_Etudiant,:Nom,:Prenom,:Sexe,:Adresse,:Lieu_de_naissance,:Date_de_naissance,:Telephone,:Email,:Filiere,:Niveau,:Nif_Cin,
       :Personne_de_reference,:Telephone_personne_reference,:Photo,:Annee_Academique,:Etat,:Memo)");
       $queryPrepare->execute([
           'Id_Etudiant'=>$Id_Etudiant,
           'Nom'=>$Nom,
           'Prenom'=>$Prenom,
           'Sexe'=>$Sexe,
           'Adresse'=>$Adresse,
           'Lieu_de_naissance'=>$Lieu_de_naissance,
           'Date_de_naissance'=>$Date_de_naissance,
           'Telephone'=>$Telephone,
           'Email'=>$Email,
           'Filiere'=>$Filiere,
           'Niveau'=>$Niveau,
           'Nif_Cin'=>$Nif_Cin,
           'Personne_de_reference'=>$Personne_de_reference,
           'Telephone_personne_reference'=>$Telephone_personne_reference,
           'Photo'=>$Photo,
           'Annee_Academique'=>$Annee_Academique,
           'Etat'=>$Etat,
           'Memo'=>$Memo
       ]);
       $_SESSION["success"]="Utilisateur enregistré avec SUCCES";
       header('Location:../Afficher-Etudiant.php');

   }

}
?>