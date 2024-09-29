<?php

    class AdminController extends Controller
    {
        public static function default()
        {
            $params = array();
            self::render("view/template/admin.php", array());
        }

        public static function displayEquipementAction()
        {
            $params = array();

            $equipements = EquipementManager::getEquipement("");

            $params['displyProduct'] = $equipements;
            $params['edit'] = true;

            self::render("view/template/Header.php", $params);
            self::render("view/template/home.php",$params);
        }

        public static function displayAddAction()
        {
            $params = array();
            
            $params["modifyMode"] = false;
            $params["equipement"] = new Equipement(0, "", 0, 0, "", 0, 0, TypeEquipementManager::getTypeEquipementById(1));
            $params["typeEquipements"] = TypeEquipementManager::getTypeEquipement();

            self::render("view/template/Header.php", $params);
            self::render("view/template/addEquipement.php", $params);
        }

        public static function displayAddStockAction()
        {
            $params = array();
            
            $params["equipement"] = EquipementManager::getEquipementById($_GET['id']);
            $params["providers"] = ProviderManager::getProvider();

            self::render("view/template/Header.php", $params);
            self::render("view/template/addEquipement.php", $params);
        }

        public static function displayModifyAction()
        {
            $params = array();
            
            $params["modifyMode"] = true;
            $params["equipement"] = EquipementManager::getEquimementById($_GET['id']);
            $params["typeEquipements"] = TypeEquipementManager::getTypeEquipement();

            self::render("view/template/Header.php", $params);
            self::render("view/template/addEquipement.php", $params);
        }

        #sera surement utilisé comme template
        public static function uploadImageAction($file)
        {
           $fileName = $file['img']['name'];
           $uploadDir = "C:/wamp64/www/kektapeequipement/ressources/images/db/";
           
           $relativeDir = "ressources/images/db/"; #chemin relatif

           $uploadFile = $uploadDir;

           $ext = pathinfo(strtolower($fileName), PATHINFO_EXTENSION); #extension de l'image
           $ext_type = array('jpg', 'jpeg', 'png');

           if(!in_array($ext, $ext_type))
           {
               echo "erreur à l'upload";
           }
           else
           {
                $hash = hash_file('md5', $file['img']['tmp_name']);
                $dbDir = $relativeDir . $hash .'.'. $ext;
                $uploadFile .=  $hash .'.'. $ext;

                if(move_uploaded_file($file['img']['tmp_name'], $uploadFile))
                {
                    echo "<p>Fichier uploadé</p>";
                }
                else
                {
                    echo "<p>Erreur à l'upload</p>";
                }
           }
        }

        public static function addEquipementAction()
        {
            $img = self::uploadImageAction($_FILES);
            EquipementManager::addEquipement($_POST['name'], $_POST['price'], $_POST['weight'], $_POST['description'], $_POST['protectionClass'], $_POST['nbPocket'], $_POST['idType']);
            self::displayEquipementAction();  
        }

        public static function modifyEquipementAction()
        {
            $img = self::uploadImageAction($_FILES);

            $id = EquipementManager::getEquipement($_POST['name'])[0]->getId();

            EquipementManager::updateEquipement($id, $_POST['name'], $_POST['price'], $_POST['weight'], $_POST['description'], $_POST['protectionClass'], $_POST['nbPocket'], $_POST['idType']);
            self::displayEquipementAction();
        }

        public static function setStockAction()
        {
            if(!ProviderManager::getStockByProviderAndEquipement($_POST['idProvider'], $_POST['idEquipement']))
            {
                ProviderManager::addStockByProviderAndEquipement($_POST['idProvider'], $_POST['idEquipement']);
            }
            ProviderManager::UpdateStockByProviderAndEquipement($_POST['idProvider'], $_POST['idEquipement'], $_POST['qty'], $_POST['qty_alert']);
        }

    }
?>