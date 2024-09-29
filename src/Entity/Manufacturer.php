<?php

    use ErrorException;

    class Manufacturer 
    {
        private $id;
        
        private $companyName;


        #Constructeur
        public function __construct()
        {
        }


        #Accesseurs
        public function getId(): ?int
        {
            return $this->id;
        }

        public function getCompanyName(): ?string
        {
            return $this->companyName;
        }

        public function setCompanyName(string $companyName): void
        {
            if(strlen(trim($companyName)) == 0)
            {
                throw new ErrorException('nom vide');
            }
            $this->companyName = $companyName;
        }


        #Fonctions

    }

?>