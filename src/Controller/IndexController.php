<?php

    class IndexController extends Controller
    {
        public static function index()
        {
            #Charge le contenu de la page index

            $params = array(); #Data envoyé

            $equipements = EquipementManager::getEquipement("");
            $displayProduct = array();

            $indexAdd = 0;  #Combien ont été ajouté
            $cursor = 0;    #Ya assez de produit ?

            while($indexAdd != 10 && $cursor < count($equipements)-1)
            {
                $add = $equipements[rand(0, count($equipements)-1)];

                if(!in_array($add, $displayProduct))
                {
                    array_push($displayProduct, $add);
                    $indexAdd++;
                }
                $cursor++;
            }

            $params['displayProduct'] = $displayProduct;
            $params['edit'] = false;

            self::render("view/template/Header.php", $params);
            self::render("view/template/home.php", $params);

        }
    }

?>