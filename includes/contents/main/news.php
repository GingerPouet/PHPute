<?php
if(isset($_SESSION['login'])){
    if(isset($_GET['page'])){
        switch ($_GET['page']){

            case 'acceuil_logged':
            include ("includes/contents/complement/news_accueil.php");
            break;

            case 'profil':
            include ("includes/contents/complement/news_profil.php");
            break;

            case 'quizz':
            include ("includes/contents/complement/news_quizz.php");
            break;
        
            case 'add_theme':
            include ("includes/contents/complement/news_quizz.php");
            break;
        
            case 'add_question':
            include ("includes/contents/complement/news_quizz.php");
            break;
        
            case 'suite_quizz':
            include ("includes/contents/complement/news_quizz.php");
            break;

            default:
            include ("includes/contents/complement/news_accueil.php");
            break;
        }
    }else{
        include ("includes/contents/complement/news_accueil.php");
    }
}
?>
