<?php
include_once("../../DBConnection/Connect.php");
   $Pseudo = htmlentities($_POST['Pseudo']);
   $Passworde = htmlentities($_POST['Passworde']);
   $ps=$pdo->prepare("SELECT * FROM Utilisateur WHERE Pseudo=? AND Passworde=?");
   $paramet=array($Pseudo, $Passworde);
   $ps->execute($paramet);

   if($utilisateur=$ps->fetch()){
    session_start();
    $_SESSION['PROFILE']=$utilisateur;
    header('Location:../../index2.php');
   }
   else{
    header('Location:../../index.php');
   }  
  
?>