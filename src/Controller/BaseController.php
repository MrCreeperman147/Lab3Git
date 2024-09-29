<?php

    class BaseController extends Controller
    {
        public static function researchAction()
        {
            $params = array(); #Data envoyé

            $request = $_POST['searchQuery'];

            $request = "%".$request."%";

            $equipements = EquipementManager::getEquipement($request);

            $params['displayProduct'] = $equipements;
            $params['edit'] = false;


            self::render("view/template/Header.php", $params);
            self::render("view/template/searchResult.php", $params);

            
        }

        public static function catalogAction()
        {
            $params = array();

            $equipements = EquipementManager::getEquipement("");

            $params['displayProduct'] = $equipements;
            $params['edit'] = false;

            self::render("view/template/Header.php", $params);
            self::render("view/template/searchResult.php", $params);
        }

        public static function catalogTypeAction()
        {
            $params = array();

            $equipements = EquipementManager::getEquipementByType($_POST['idType']);

            $params['displayProduct'] = $equipements;
            $params['edit'] = false;

            self::render("view/template/Header.php", $params);
            self::render("view/template/searchResult.php", $params);
        }

        public static function loginAction()
        {
            self::render("view/template/Header.php", array());
            self::render("view/template/connexion.php", array());
        }

        public static function registerAction()
        {
            self::render("view/template/Header.php", array());
            self::render("view/template/inscription.php", array());
        }
    }

?>