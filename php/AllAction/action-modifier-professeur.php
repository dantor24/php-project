<?php
session_start();
if(!isset($_SESSION['user'])){
   $_SESSION["error"]="Veuillez d'abord vous connectés";
}
$errors=[];
include_once("../../DBConnection/Connect.php");
if(isset($_POST['submit'])){

   $Nom = htmlentities(trim($_POST['Nom']));
   $Prenom = htmlentities($_POST['Prenom']);
   $Sexe = htmlentities($_POST['Sexe']);
   $Adresse = htmlentities($_POST['Adresse']);
   $Telephone = htmlentities($_POST['Telephone']);
   $Statut_Matrimonial = htmlentities($_POST['Statut_Matrimonial']);
   $Lieu_de_naissance = htmlentities($_POST['Lieu_de_naissance']);
   $Date_de_naissance = htmlentities($_POST['Date_de_naissance']);
   $Niveau = htmlentities($_POST['Niveau']);
   $Cours_a_enseigner = htmlentities($_POST['Cours_a_enseigner']);
   $Filieres_affectes = htmlentities($_POST['Filieres_affectes']);
   $Salaire = htmlentities($_POST['Salaire']);
   $Poste = htmlentities($_POST['Poste']);
   $Email = htmlentities($_POST['Email']);
   $Nif_Cin = htmlentities($_POST['Nif_Cin']);
   $Etat = htmlentities($_POST['Etat']);
   $Memo = htmlentities($_POST['Memo']);

   $id = htmlentities($_POST['id']);

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
    if(empty($Statut_Matrimonial)){
        $errors['Statut_Matrimonial']="Le Statut Matrimonial doit etre renseigne";
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
    if(empty($Cours_a_enseigner) && !preg_match("^[a-zA-Z ]{2,40}$",$Cours_a_enseigner)){
        $errors['Cours_a_enseigner']="Le cours a enseigner doit etre renseigne";
    }
    // 
    if(empty($Filieres_affectes) && !preg_match("^[a-zA-Z1-9-_ ]{2,20}$",$Filieres_affectes)){
        $errors['Filieres_affectes']="Filieres affectes doit etre renseigne";
    }
    if(empty($Salaire) && !preg_match("^[0-9]{1,10}$",$Salaire)){
        $errors['Salaire']="Le Salaire doit etre renseigne";
    }
    // 
    if(empty($Poste) && !preg_match("^[0-9]{1,10}$",$Poste)){
        $errors['Poste']="Le Poste doit etre renseigne";
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
        $queryPrepare=$pdo->prepare("UPDATE dossierprof SET Nom=:Nom, Prenom=:Prenom, Sexe=:Sexe, Adresse=:Adresse, Telephone=:Telephone, Statut_Matrimonial=:Statut_Matrimonial, Lieu_de_naissance=:Lieu_de_naissance, Date_de_naissance=:Date_de_naissance, Niveau=:Niveau, Cours_a_enseigner=:Cours_a_enseigner, Filieres_affectes=:Filieres_affectes, Salaire=:Salaire, Poste=:Poste, Email=:Email, Nif_Cin=:Nif_Cin, Etat=:Etat, Memo=:Memo WHERE id=:id");
        $queryPrepare->execute([
           'Nom'=>$Nom,
           'Prenom'=>$Prenom,
           'Sexe'=>$Sexe,
           'Adresse'=>$Adresse,
           'Telephone'=>$Telephone,
           'Statut_Matrimonial'=>$Statut_Matrimonial,
           'Lieu_de_naissance'=>$Lieu_de_naissance,
           'Date_de_naissance'=>$Date_de_naissance,
           'Niveau'=>$Niveau,
           'Cours_a_enseigner'=>$Cours_a_enseigner,
           'Filieres_affectes'=>$Filieres_affectes,
           'Salaire'=>$Salaire,
           'Poste'=>$Poste,
           'Email'=>$Email,
           'Nif_Cin'=>$Nif_Cin,
           'Etat'=>$Etat,
           'Memo'=>$Memo,
           'id'=>$id,
       ]);
       $_SESSION["success"]="Utilisateur enregistré avec SUCCES";
       header('Location:../afficher-professeur.php');
   }

}
?>