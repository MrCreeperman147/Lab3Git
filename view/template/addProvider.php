<div class = "add_provider">
    <h1>Gerer les stocks</h1>

    <form class = "add_provider_form" method = "POST" action = 'index.php?controller=AdminController&action=setStockAction' enctype='multipart/form-data' >
        
        <p>
            <label><?= $equipement->getName() ?></label>
        </p>

        <p>
            <label for="idProvider">Les fournisseur : </label><br />
            <select name="idProvider" >
                <?php
                    foreach ($providers as $provider) 
                    {
                        if ($equipement->getProvider()->getId() == $provider->getId()) 
                        {
                        ?>
                            <option selected value="<?= $provider->getId() ?>"><?= $provider->getName() ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $provider->getId() ?>"><?= $provider->getName() ?></option>
                    <?php
                        }
                    }
                #Casse-gueule comme manière de codé, faudrai trouver une meilleur methode
                ?>
            </select>        
        </p>

        <p>
            <label for="qty">Stock du fournisseur : </label><br />
            <input type="number" name="qty" id="qty" value= "0" required />
        </p>
        <p>
            <label for="qty_alert">Seuil d'alerte : </label><br />
            <input type="number" name="qty_alert" id="qty_alert" value="0" required />
        </p>

            <input type ="hidden" name = "idEquipement" value = "<?= $equipement->getId() ?>" />

        <p>
            <input type = "submit" id = "send" value = "Confirmer" />
        </p>
    </form>
</div>