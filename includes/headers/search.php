<div id="search">
    <div id="theme">
        <p>Recherche par thème</p>
        <form id="search_theme" method="post" action="index.php?page=resultsearch">
        <select name="theme">
        <option value="musique">musique</option>
        <option value="cinema">cinéma</option>
        <option value="sport">sport</option>
        <option value="kikoololxoxo">kikoololxoxo</option>
        </select>
        <input type="submit" name="search_theme"/>
        </form>
        
    </div>
    <div id="user">
        <p>Recherche par login</p>
        <form id="search_user" method="post" action="index.php?page=resultsearch">
            <input type="text" name="login" value="Tapez le login" />
            <input type="submit" name="search" value="chercher" />
        </form>
    </div>

    <div class="clear"></div>
</div>