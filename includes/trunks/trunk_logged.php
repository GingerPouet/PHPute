 <div class="droite">
    <?php 
    if(isset($_GET['page'])){
        switch ($_GET['page']){ 

            case 'acceuil_logged':
            include ("includes/contents/complement/news.php");
            break;

            case 'profil':
            include ("includes/contents/complement/profil.php");
            break;

            case 'quizz':
            include ("includes/contents/complement/news.php");
            break;
        
            case 'logout':
            include ("includes/headers/logout.php");
            break;

            default:
            include ("includes/contents/complement/news.php");
            break;
        }
    }else{
        include ("includes/contents/complement/news.php");
    }
    ?>
 </div>
 <div class="gauche">
     <?php 
     if(isset($_GET['page'])){
        switch ($_GET['page']){ 

            case 'acceuil_logged':
            include("includes/contents/main/accueil_logged.php");
            break;

            case 'profil':
            include ("includes/contents/complement/news.php");
            break;

            case 'quizz':
            include ("includes/contents/complement/quizz.php");
            break;

            default:
            include ("includes/contents/main/accueil_logged.php");
            break;
        }
    }else{
        include("includes/contents/main/accueil_logged.php");
        }
    ?>
 </div>