<div class = "login">
    <h1>Connexion</h1>
    <form class = "login_form" method = "POST" action="index.php?controller=UserController&action=loginAction">
        <p>
            <label>Nom de code</label><br />
            <input type = "text" id = "codename" name = "codename" required/>
            <br />
            <label>Mot de passe</label><br />
            <input type = "password" id = "pw" name = "pw" required/>
            <br />
            <input type = "submit" id = "send" value = "Se Connecter" />
        </p>
    </form>
</div>