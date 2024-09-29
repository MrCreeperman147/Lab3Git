<div class = "item_ticket">
    <img class = "item_pic" src ="<?= $linkImage ?>"/>

    <h2><?=$name?></h2>
    <h3><?= $typeEquipement ?></h3>
    <h3><?= $price?> ₽</h3>

    <dialog class = "item_modal">
        <img class = "item_pic" src ="<?= $linkImage ?>"/>

        <h2><?=$name?></h2>
        <h3><?= $typeEquipement ?></h3>
        <h3>poids : <?= $weight ?> KG</h3>
        <h3>Classe de protection : <?= $protectionClass ?></h3>
        <h3><?= $description ?></h3>
        
        <h3><?= $price?> ₽</h3>
        <?php 
            if(!$edit)
            {
                echo '<form method = "post" action = "index.php?controller=cartController&action=displyModifyAction&id=<?= $id?>';
                echo '<form method = "post" action = "index.php?controller=cartController&action=displayAddStockAction&id=<?= $id?>';
            }
            else
            {
                echo '<form method = "post" action = "index.php?controller=AdminController&action=displyModifyAction&id=<?= $id?>';
            }
        ?>
        <form method = "post" action = "index.php?controller=cart&action=add&id=<?= $id?>">
            <input type = "submit" class = "item_btn_command" value = "Ajouter au panier"/>
        </form>
    </dialog>
</div>

