<?php
// si le formulaire de recherche est cliqué et rempli
   if(isset($_POST['search']) && !empty($_POST['search'])){
           $sql = "SELECT idUser FROM user WHERE login = '".$_POST["login"]."' ";
            $result = mysql_query($sql);
            $nbResults = mysql_num_rows($result);
            if($nbResults>0){
                echo 'Voir le profil de <a href="index.php?page=profil&login='.$_POST["login"].'">'.$_POST["login"].'</a>?';
                
            }
   }
?>