<?php
function createUser($login,$mail,$mdp,$nom,$prenom,$dateN,$sex){
    $request="INSERT INTO user (login, mail, mdp, nom, prenom, dateN, sex) VALUES ('".$_POST['login']."','".$_POST['mail']."','".$_POST['mdp']."','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['dateN']."','".$_POST['sex']."'";
}
?>
