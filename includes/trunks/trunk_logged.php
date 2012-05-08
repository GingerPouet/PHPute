 <div class="droite">
    <?php 
    if(isset($_GET['page'])){
        switch ($_GET['page']){ 

            case 'acceuil_logged':
            include ("includes/contents/main/news.php");
            break;

            case 'profil':
            include ("includes/contents/main/profil.php");
            break;

            case 'quizz':
            include ("includes/contents/main/news.php");
            break;
        
            case 'logout':
            include ("includes/headers/logout.php");
            break;

            default:
            include ("includes/contents/main/news.php");
            break;
        }
    }else{
        include ("includes/contents/main/news.php");
    }
    ?>
 </div>
 <div class="gauche">
     <?php 
     if(isset($_GET['page'])){
        switch ($_GET['page']){ 
            
            case 'resultsearch':
            include("includes/contents/complement/resultsearch.php");
            break;
        
            case 'add_theme':
            include("includes/contents/complement/form_quizz/add_theme.php");
            break;
        
            case 'add_question':
            include("includes/contents/complement/form_quizz/add_question.php");
            break;
        
            case 'suite_quizz':
            include("includes/contents/complement/form_quizz/suite_quizz.php");
            break;

            case 'acceuil_logged':
            include("includes/contents/main/accueil_logged.php");
            break;

            case 'profil':
            include ("includes/contents/main/news.php");
            break;

			case 'modifier_infos':
            include ("includes/contents/complement/modifier_infos.php");
            break;
			
			case 'supprimer_compte':
            include ("includes/contents/complement/supprimer_compte.php");
            break;
			
			case 'compte_supprime':
            include ("includes/contents/complement/compte_supprime.php");
            break;
			
            case 'quizz':
            include ("includes/contents/main/quizz.php");
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