<form method="post" action="<?php echo 'index.php?page=profil&login=' . $_SESSION["login"]; ?>" enctype="multipart/form-data">
    <p>
        Choisir l'image (jpg, png, gif | max. 1Mo) :<br />
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> <!-- taille max : 1 Mo-->
        <input type="file" name="im_avatar"/><br />
        <input type="submit" name ="change" value="Envoyer" />
    </p>
</form>
