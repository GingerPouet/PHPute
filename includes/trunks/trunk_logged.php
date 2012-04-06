 <div class="droite">
    <?php 
        switch ($pages){ 

            case accueil:
            include ("includes/contents/news.php");
            break;

            case profil:
            include ("includes/contents/complement/profil.php");
            break;

            case quizz:
            include ("includes/contents/news.php");
            break;

            default:
            include ("includes/contents/news.php");
            break;
        }
    ?>
 </div>
 <div class="gauche">
     <?php 
        switch ($pages){ 

            case accueil:
            include ("includes/contents/main/accueil_logged.php");
            break;

            case profil:
            echo "<a href=\"index.php?page=profil\" alt=\"profil.php\"></a>";
            break;

            case quizz:
            echo "<a href=\"index.php?page=quizz\" alt=\"quizz.php\"></a>";
            break;

            default:
            echo "<a href=\"index.php\" alt=\"index.php\"></a>";
            break;
        }
    ?>
 </div>