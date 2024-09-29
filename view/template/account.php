<div class = "account">
    <h1>
        Votre profile
    </h1>

    <form class = "account.form" method ="POST" action="index.php?controller=UserController&action=updateAction">
        <p>
            <label for="codename">Nom de code: </label><br />
            <input type="text" name="codename" id="codename" value = <?= $_COOKIE['codename']?>  />
        </p>
        <p>
            <label for="mail">Email : </label><br />
            <input type="email" name="mail" id="mail" value = <?= $params['mail']?> />
        </p>
        <p>
            <label for="tel">Telephone : </label><br />
            <input type="tel" name="tel" id="tel" value = <?= $params['tel']?> />
        </p>
        <p>
            <input type = "submit" id = "send" value = "Mettre à jour" />
        </p>
    </form>
    <a class = "account_orders" href = "index.php?controller=OrderController&action=currentOrderAction">Vos Commandes</a>
</div>