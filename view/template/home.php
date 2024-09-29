<div class = "home">
    <h1 class = "home_title">Notre Sélection pour vos raids</h1>
    <div class = "home_content">
        <?php
            if(count($displayProduct) != 0)
            {
                //un foreach ne fonctionne pas !?
                for ($i = 0; $i != count($displayProduct); $i++)
                {
                    $params = array();

                    $params['id'] = $displayProduct[$i]->getId();

                    $params['name'] = $displayProduct[$i]->getName();
                    $params['price'] = $displayProduct[$i]->getPrice();
                    $params['weight'] = $displayProduct[$i]->getWeight();
                    $params['description'] = $displayProduct[$i]->getDescription();
                    $params['protectionClass'] = $displayProduct[$i]->getProtectionClass();
                    $params['nbPocket'] = $displayProduct[$i]->getNbPocket();
                    $params['typeEquipement'] = $displayProduct[$i]->getTypeEquipement()->getLibelle();

                    $params['edit'] = $edit;

                    foreach($displayProduct[$i]->getImages() as $key => $value)
                    {
                        $params['linkImage'] = $value->getLink();
                    }


                    IndexController::render("view/template/itemTicket.php", $params);

                }

            }

        ?>
    </div>
</div>

<script>
//Affiche une fenetre modale
var item = document.getElementsByClassName("item_ticket");

for(var i = 0; i < item.length; i++)
{
    item[i].addEventListener("click", function()
    {
        var dialog = this.querySelector(".item_modal");
        if(!dialog.open)
        {
            dialog.showModal();

        }
        else
        {
            dialog.close();
        }              
    });
}

</script>