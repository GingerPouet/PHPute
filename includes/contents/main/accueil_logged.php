<?php
if ((isset($_SESSION['login'])) && (!empty($_SESSION['login']))){
    echo '<div class="bjr">Bonjour '. $_SESSION['login'].', bienvenu sur KQBB.</div>';
    include ("includes/contents/main/html/bienvenulog.php");
}  else {
    echo 'marche pas';  
    echo $_SESSION['login'];
}
?>