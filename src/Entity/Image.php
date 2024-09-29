<?php

    use ErrorException;

    class Image
    {
        private $id;

        private $link;


        #Constructeur
        public function __construct()
        {
        }


        #Accesseurs
        public function getId(): ?int
        {
            return $this->id;
        }

        public function getLink(): ?string
        {
            return $this->link;
        }

        #Fonctions
    }

?>