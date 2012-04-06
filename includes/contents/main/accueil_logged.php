<?php
if (isset($_GET['login'])){
    echo 'Bonjour'. $_GET['login'];?>
    <p>, bienvenue sur <nom du site>, <br/>;
        * Rechercher un Quizz par thème ou par auteur:<br/>;
    <span class="indentation">Vous souhaitez trouver les quizz d\'un auteur en particulier ? Nous vous conseillons d\'utiliser la barre de recherche d\'auteur, ses quizz étant disponibles sur sa page.</span><br/>;
    <span class="indentation">Seul les quizz musicaux vous intéressent ? Préférez la recherche par thème !</span><br/> <!-- text-indent:5px;-->;
    * Modifier votre profil.<br/>';
    * Créer un quizz.<br/></p>';
 <?php
}
else {
    echo'Il ne s\'agit pas des bons identifiants.';
}
 ?>