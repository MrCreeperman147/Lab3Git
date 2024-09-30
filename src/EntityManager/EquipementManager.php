<?php

    class EquipementManager
    {
        #Utilisé pour la barre de recherche
        public static function getEquipement(string $search)
        {
            $query = "SELECT id, name, price, weight, description, protection_class, nb_pocket, id_manufacturer, id_type FROM equipement";

            if (!is_null($search) && strlen(trim($search)) != 0)
            {
                $query .= " WHERE name LIKE :search";
            }

            try
            {
                $result = EntityManager::prepare($query);

                if (!is_null($search) && strlen(trim($search)) != 0)
                {
                    $result->bindValue(':search', $search);                
                }

                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $equipements = array();

                while($arr = $result->fetch()) #pour chaque ligne, bizzarement la boucle se ferme :think:
                {


                    #Recupère le manufacurer et le type
                    #$manufacturer = ManufacturerManager::getManufacturerById($arr['id_manufacturer']); #pour de future updates
                    $typeEquipement = TypeEquipementManager::getTypeEquipementById($arr['id_type']);
                    
                    #creer l'objet
                    $equipement = new Equipement($arr['id'], $arr['name'], $arr['price'], $arr['weight'], $arr['description'], $arr['protection_class'], $arr['nb_pocket'], $typeEquipement);

                    #lier l'image
                    $images = array();
                    $images = ImageManager::getImageByIdEquipement($arr['id']);
                    
                    foreach($images as $value)
                    {
                        
                        $equipement->addImage($value);
                    }
                    unset($value);

                    $equipements[] = $equipement;
                }

            }
            catch (Exception $ex)
            {
                die("Echec de la recherche");
            }
            //var_dump($equipements);
            return $equipements;
        }

        public static function getEquipementByType(int $id_type)
        {
            $query = "SELECT id, name, price, weight, description, protection_class, nb_pocket, id_manufacturer, id_type FROM equipement WHERE id_type = :id_type";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id_type", $id_type);  

                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);

                $equipements = array();

                while($arr = $result->fetch()) #pour chaque ligne
                {
                    #Recupère le manufacurer et le type
                    #$manufacturer = ManufacturerManager::getManufacturerById($arr['id_manufacturer']);
                    $typeEquipement = TypeEquipementManager::getTypeEquipementById($arr['id_type']);

                    #Creer l'objet
                    $equipement = new Equipement($arr['id'], $arr['name'], $arr['price'], $arr['weight'], $arr['description'], $arr['protection_class'], $arr['nb_pocket'], $typeEquipement);

                    #lier l'image
                    $images = array();
                    $images = ImageManager::getImageByIdEquipement($arr['id']);

                    foreach($images as $value)
                    {
                        $equipement->addImage($value);
                    }
                    unset($value);

                    $equipements[] = $equipement;
                }

            }
            catch (Exception $ex)
            {
                die( "Echec de la recherche");
            }

            return $equipements;
        }

        public static function getEquimementById(int $id)
        {
            $query = "SELECT name, price, weight, description, protection_class, nb_pocket, id_manufacturer, id_type FROM equipement WHERE id = :id";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id", $id);  

                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);

                while($arr = $result->fetch()) #pour chaque ligne
                {
                    #Recupère le manufacurer et le type
                    $manufacturer = ManufacturerManager::getManufacturerById($arr['id_manufacturer']);
                    $typeEquipement = TypeEquipementManager::getTypeEquipementById($arr['id_type']);

                    #Creer l'objet
                    $equipement = new Equipement($id, $arr['name'], $arr['price'], $arr['weight'], $arr['description'], $arr['protection_class'], $arr['nb_pocket'], $manufacturer, $typeEquipement);

                    #lier l'image
                    $images = array();
                    $images = ImageManager::getImageByIdEquipement($arr['id']);

                    foreach($images as $value)
                    {
                        $equipement->addImage($value);
                    }
                    unset($value);

                    $equipement;
                }

            }
            catch (Exception $ex)
            {
                die( "Echec de la recherche");
            }

            return $equipement;
        }

        #BackOffice

        public static function addEquipement(string $name, int $price, int $weight, string $desctiption, int $protectionClass, int $nbPocket, int $idTypeEquipement) : void
        {
            $query = "INSERT INTO equipement VALUES string :name, :price, :weight, :desctiption, :protectionClass, :nbPocket, :idTypeEquipement";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":name", $name);  
                $result->bindParam(":price", $price);
                $result->bindParam(":weight", $weight);  
                $result->bindParam(":desctiption", $desctiption);    
                $result->bindParam(":protectionClass", $protectionClass); 
                $result->bindParam(":nbPocket", $nbPocket);    
                $result->bindParam(":idTypeEquipement", $idTypeEquipement);    

                $result->execute();
            }
            catch(Exception $ex)
            {
                echo "erreur a l'ajout de l'equipement";
            }
        }


        public static function updateEquipement(int $id, string $name, int $price, int $weight, string $desctiption, int $protectionClass, int $nbPocket, int $idTypeEquipement) : void
        {
            $query = "UPDATE equipement SET string :name, :price, :weight, :desctiption, :protectionClass, :nbPocket, :idTypeEquipement WHERE id = :id";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id", $id);  
                $result->bindParam(":name", $name);  
                $result->bindParam(":price", $price);
                $result->bindParam(":weight", $weight);  
                $result->bindParam(":desctiption", $desctiption);    
                $result->bindParam(":protectionClass", $protectionClass); 
                $result->bindParam(":nbPocket", $nbPocket);    
                $result->bindParam(":idTypeEquipement", $idTypeEquipement);    

                $result->execute();
            }
            catch(Exception $ex)
            {
                echo "erreur a la mise a jour de l'equipement";
            }
        }
    }

?>