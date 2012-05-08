<div id="search">
    <div id="theme">
        <p>Recherche par thème</p>
        <form id="search_theme" method="post" action="index.php?page=resultsearch">
        <select name="theme">
        <option value="1">Musique</option>
        <option value="2">Cinéma</option>
        <option value="3">Littérature</option>
        <option value="4">Sport</option>
        <option value="5">Histoire</option>
        <option value="6">Loisir</option>
        <option value="7">Animaux</option>
        <option value="8">Humour</option>
        </select>
        <input type="submit" name="search_theme"/>
        </form>
        
    </div>
    <div id="user">
        <p>Recherche par login</p>
        <form id="search_user" method="post" action="index.php?page=resultsearch">
            <input type="text" name="login" value="Tapez le login" />
            <input type="submit" name="search" value="Chercher" />
        </form>
    </div>

    <div class="clear"></div>
</div>