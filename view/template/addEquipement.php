<div class = "add_equipement">
    <?php
        if($modifyMode)
        {
            echo "<h1>Modifier un produit</h1>
                      <form class = 'add_equipement_form' method = 'POST' action = 'index.php?controller=AdminController&action=updateEquipementAction' enctype='multipart/form-data'>";
        }
        else
        {
            echo "<h1>Ajouter un produit</h1>
                      <form class = 'add_equipement_form' method = 'POST' action = 'index.php?controller=AdminController&action=addEquipementAction' enctype='multipart/form-data'>";
        }
    ?>
     <form class = 'add_equipement_form' method = 'POST' action = 'index.php?controller=AdminController&action=updateEquipementAction' enctype='multipart/form-data'>
        <p>
            <label for="name">Nom du produit : </label><br />
            <input type="text" name="name" id="name" value="<?= $equipement->getName() ?>" required />
        </p>
        <p>
            <label for="price">Prix : </label><br />
            <input type="number" name="price" id="price" value="<?= $equipement->getPrice()?>" required />
        </p>
        <p>
            <label for="weight">Poids : </label><br />
            <input type="number" name="weight" id="weight" value="<?= $equipement->getWeight() ?>" required />
        </p>
        <p>
            <label for="description">Description : </label><br />
            <input type="text" name="description" id="description" value="<?= $equipement->getDescription() ?>" required />
        </p>
        <p>
            <label for="protectionClass">Classe de protection : </label><br />
            <input type="number" name="protectionClass" id="protectionClass" value="<?= $equipement->getProtectionClass() ?>" required />
        </p>
        <p>
            <label for="nbPocket">Nombre d'emplacement : </label><br />
            <input type="number" name="nbPocket" id="nbPocket" value="<?= $equipement->getNbPocket() ?>" required />
        </p>

        <p>
            <label for="idType">Type d'equipement : </label><br />
            <select name="idType" >
                <?php
                    foreach ($typeEquipements as $typeEquipement) 
                    {
                        if ($equipement->getTypeEquipement()->getId() == $typeEquipement->getId()) 
                        {
                        ?>
                            <option selected value="<?= $typeEquipement->getId() ?>"><?= $typeEquipement->getLibelle() ?></option>
                        <?php
                        } else {
                        ?>
                            <option value="<?= $typeEquipement->getId() ?>"><?= $typeEquipement->getLibelle() ?></option>
                    <?php
                        }
                    }
                #Casse-gueule comme manière de codé, faudrai trouver une meilleur methode
                ?>
            </select>        
        </p>

        <p>
            <label for="img">Image de l'equipement : </label><br />
            <input  type="file" name="img" accept=".png, .jpg, .jpeg">
        </p>

        <p>
            <input type = "submit" id = "send" value = "Confirmer" />
        </p>
    </form>
</div>