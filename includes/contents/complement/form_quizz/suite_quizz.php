<?php
// si le bouton Ajouter theme est cliqué
if(isset($_POST['add_t'])){
   include('includes/contents/complement/form_quizz/recupquizz.php');
    //on affiche la page d'ajout de thème
    include('includes/contents/complement/form_quizz/add_theme.php');
}else{
?>
<form method="post" action="index.php?page=suite_quizz">
    <input type="submit" name="add_t" value="Ajouter un thème" />
</form> 
<?php
    }
   if(isset($_POST['add_q'])){
         include('includes/contents/complement/form_quizz/recupquizz.php');
    //on affiche la page d'ajout de thème
    include('includes/contents/complement/form_quizz/add_question.php');
}else{
?>
<form method="post" action="index.php?page=suite_quizz">
    <input type="submit" name="add_q" value="Ajouter une question" />
</form> 
<?php
   } 
    
    
    
?>