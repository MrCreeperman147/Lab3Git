<?php

    class ImageManager
    {
        public static function getImageByIdEquipement(int $id_equipement)
        {
            $query = "SELECT id, link FROM image
                        JOIN attach on attach.id_image = image.id
                      WHERE attach.id_equipement = :id_equipement";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":id_equipement", $id_equipement);  

                $result->execute();
                
                $retour = $result->fetchAll(PDO::FETCH_CLASS, 'Image');
            }
            catch(Exception $ex)
            {
                echo "erreur au chargement de l'image";
            }

            return $retour;
        }
    }

?>