<?php

    class BodyPart
    {
        private $code;

        private $name; 


        #Constructeur
        public function __construct()
        {
        }

        #Accesseurs
        public function getCode(): ?string
        {
            return $this->code;
        }

        public function getName(): ?string
        {
            return $this->name;
        }

        
        #Fonctions
    }


?>