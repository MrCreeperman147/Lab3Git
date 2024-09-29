<?php

    class ManufacturerManager
    {
        public static function getManufacturerById(int $id)
        {
            $query = "SELECT id, company_name FROM manufacturer WHERE id = :id";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id", $id);  

                $result->execute();
                $result->setFetchMode(PDO::FETCH_CLASS, 'Manufacturer');

                $retour = $result->fetch();
            }
            catch (Exception $ex)
            {
                die("erreur au chargement des fabriquants : " . $ex->getMessage());
            }

            return $retour;
        }
    }

?>