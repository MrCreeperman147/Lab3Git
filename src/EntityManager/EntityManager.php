<?php

    //Connexion a la db et execution des requetes

    class EntityManager
    {
        #Database Connexion
        private const HOST = '127.0.0.1';
        private const PORT = '3306';
        private const DBNAME = 'db_kektapeequipement';
        private const CHARSET = 'utf8';
        private const LOGIN = 'root';
        private const PW = '';
        private static $connexion = null;

        public static function getConnexion()
        {
            if(self::$connexion == null )
            {
                try
                {
                    self::$connexion = new PDO('mysql:host=' .self::HOST. ';port=' .self::PORT. ';dbname=' .self::DBNAME. ';charset=' .self::CHARSET, self::LOGIN, self::PW);
                }
                catch(PDOException $e)
                {
                    die ("Erreur à la connexion à la DB : " . $e->getMessage());
                }
            }
        }

        //Prepare la requete et la renvoi non executé
        public static function prepare(string $query) : PDOStatement
        {
            self::getConnexion();
            $retour = self::$connexion->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)); //Permet de parcourir le resultat avec un curseur
            return $retour;
        }

        //Prepare une requete, l'execute et renvoie le resultat
        public static function execute(string $query) : PDOStatement
        {
            self::getConnexion();
            $retour = self::$connexion->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)); //Permet de parcourir le resultat avec un curseur
            $retour->execute();
            return $retour;
        }
    }

?>