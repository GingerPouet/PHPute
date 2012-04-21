<?php
// si le formulaire de recherche par login est cliqué et rempli
   if(isset($_POST['search']) && !empty($_POST['search'])){
           $sql = "SELECT idUser FROM user WHERE login = '".$_POST["login"]."' ";
            $result = mysql_query($sql);
            $nbResults = mysql_num_rows($result);
            if($nbResults>0){
                echo 'Voir le profil de <a href="index.php?page=profil&login='.$_POST["login"].'">'.$_POST["login"].'</a>?';
                
            }
   }
   
//si le formulaire de recherche par thème est cliqué
      if(isset($_POST['search_theme'])){
           $sql = "SELECT titre FROM quizz WHERE theme1 = '".$_POST["theme"]."'OR theme2='".$_POST["theme"]."'OR theme3='".$_POST["theme"]."' ";
            $result2 = mysql_query($sql);
            $nbResultstheme = mysql_num_rows($result2);
            if($nbResultstheme>0){
                echo 'Voir les quizz sur le thème <a href="index.php?page=quizz&theme='.$_POST["theme"].'">'.$_POST["theme"].'</a>?';
                
            }
   }
?>
