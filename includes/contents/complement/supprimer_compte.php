<?php

echo '<b>Attention !</b><br /><br /> Vous êtes sur le point de supprimer votre compte. Si vous confirmez, tous vos quizz seront définitivement supprimés et vos informations personnelles seront perdues. Vous ne pourrez donc plus visiter les pages de KQKB.<br /><br />';

?>

<form method="post" action="<?php echo 'index.php?page=compte_supprime' ?>" enctype="multipart/form-data">
	<p>
		<input type="submit" name ="supprimer" value="Oui, je veux supprimer définitivement mon compte."/>
	<p>
</form>

<form method="post" action="<?php echo 'index.php?page=supprimer_compte' ?>" enctype="multipart/form-data">
	<p>
		<input type="submit" name ="annuler" value="Non, c'est une erreur ! Ramenez-moi sur mon profil !"/>
	</p>
</form>

<?php

if(isset($_POST['annuler'])){
	header("Refresh:1 ;url=index.php?page=profil&login=" . $_SESSION['login']);
}

?>