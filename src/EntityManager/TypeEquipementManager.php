<?php

    class TypeEquipementManager
    {
        public static function getTypeEquipementById(int $id)
        {
            $query = "SELECT id, libelle FROM type WHERE id = :id";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id", $id);  

                $result->execute();
                $result->setFetchMode(PDO::FETCH_CLASS, 'TypeEquipement');

                $retour = $result->fetch();
            }
            catch (Exception $ex)
            {
                die("erreur au chargement des types : " . $ex->getMessage());
            }

            return $retour;
        }

        public static function getTypeEquipement()
        {
            $query = "SELECT id, libelle FROM type";

            try
            {
                $result = EntityManager::prepare($query);

                $result->execute();
                $result->setFetchMode(PDO::FETCH_CLASS, 'TypeEquipement');

                $retour = $result->fetchAll();
            }
            catch (Exception $ex)
            {
                die("erreur au chargement des types : " . $ex->getMessage());
            }

            return $retour;
        }
    }

?>