<div class = "register">    
    <h1>Inscription</h1>     
    <form class = "register_form" method = "POST" action = "index.php?controller=UserController&action=registerAction">
        <p>
            <label for="codename">Nom de code: </label><br />
            <input type="text" name="codename" id="codename" required />
        </p>
        <p>
            <label for="mail">Email : </label><br />
            <input type="email" name="mail" id="mail" required />
        </p>
        <p>
            <label for="tel">Telephone : </label><br />
            <input type="tel" name="tel" id="tel" required />
        </p>
        <p>
            <label for="pw">Mot de passe : </label><br />
            <input type="password" name="pw" id="pw" required />
        </p>
        <p>
            <label for="confpw">Confirmer le mot de passe : </label><br />
            <input type="password" name="confpw" id="confpw" required />
        </p>
        <p>
            <input type = "submit" id = "send" value = "Confirmer" />
        </p>
    </form>
</div>