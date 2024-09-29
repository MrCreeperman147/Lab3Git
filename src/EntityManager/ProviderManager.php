<?php

    class ProviderManager 
    {
        public static function getProvider()
        {
            $query = "SELECT id, name, location from provider";

            try
            {
                $result = EntityManager::prepare($query);
                $result->execute();
                $retour = $result->fetchAll(PDO::FETCH_ASSOC);

                $providers = array();

                while($arr = $result->fetch()) #pour chaque ligne, bizzarement la boucle se ferme :think:
                {                    
                    #creer le provider
                    $provider = new Provider($arr['id'], $arr['name'], $arr['location']);

                    $providers[] = $provider;
                }
            }
            catch(Exception $ex)
            {
                echo "erreur au chargement du fournisseur";
            }

            return $providers;
        }

        public static function getProviderById(int $id)
        {
            $query = "SELECT name, location from provider where id = :id";

            try
            {
                $result = EntityManager::prepare($query);
                $result->bindParam(":id", $id);  

                $result->execute();
                $retour = $result->fetchAll(PDO::FETCH_ASSOC);

                while($arr = $result->fetch()) #pour chaque ligne, bizzarement la boucle se ferme :think:
                { 
                    #creer le provider
                    $provider = new Provider($id, $arr['name'], $arr['location']);
                }
            }
            catch(Exception $ex)
            {
                echo "erreur au chargement du fournisseur";
            }

            return $provider;
        }

        public static function getStockByProvider(int $id)
        {
            $query = "SELECT id_equipement, qty, qty_alert from provide WHERE id_provider = :id";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id", $id);  

                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);

                $merchs = array();
                
                while($arr = $result->fetch())
                {
                    #recupère l'equipement et le provider
                    $equipement = EquipementManager::getEquimementById($arr['id_equipement']);
                    $provider = ProviderManager::getProviderById($id);

                    $merch = new Provide($equipement, $provider, $arr['qty'], $arr['qty_alert']);

                    $merchs[] = $merch;
                }
                
            }
            catch(Exception $ex)
            {
                echo "erreur au chargement du stock";
            }

            return $merchs;
        }

        public static function getStockByProviderAndEquipement(int $id_provider, int $id_equipement)
        {
            $query = "SELECT qty, qty_alert from provide WHERE id_provider = :id_provider AND id_equipement = :id_equipement";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id_provider", $id_provider);  
                $result->bindParam(":id_equipement", $id_equipement);  

                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);

                if($result->fetch()->rowcount() != 0)
                {
                    while($arr = $result->fetch())
                    {
                        #recupère l'equipement et le provider
                        $equipement = EquipementManager::getEquimementById($id_equipement);
                        $provider = ProviderManager::getProviderById($id_provider);
    
                        $merch = new Provide($equipement, $provider, $arr['qty'], $arr['qty_alert']);
    
                        return $merch;
                    }
                }
                else
                {
                    return false;
                }
            }
            catch(Exception $ex)
            {
                echo "erreur au chargement du stock";
            }

        }

        public static function addStockByProviderAndEquipement(int $id_provider, int $id_equipement)
        {
            $query = "INSERT INTO provide VALUES :id_equipement, :id_provider";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id_provider", $id_provider);  
                $result->bindParam(":id_equipement", $id_equipement);   

                $result->execute();
            }
            catch(Exception $ex)
            {
                echo "erreur a l'ajout du stock";
            }
        } 

        public static function UpdateStockByProviderAndEquipement(int $id_provider, int $id_equipement, int $qty, int $qty_alert)
        {
            $query = "UPDATE provide SET :qty, :qty_alert WHERE id_equipement = :id_equipement AND id_provider = :id_provider";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id_provider", $id_provider);  
                $result->bindParam(":id_equipement", $id_equipement);
                $result->bindParam(":qty", $qty);  
                $result->bindParam(":qty_alert", $qty_alert);    

                $result->execute();
            }
            catch(Exception $ex)
            {
                echo "erreur a la mise a jour du stock";
            }
        } 
    }

?>