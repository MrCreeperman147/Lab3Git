<?php

    use ErrorException;

    class Material
    {
        private $id;

        private $name;



        #Constructeur
        public function __construct()
        {
        }


        #Accesseurs
        public function getId(): ?int
        {
            return $this->id;
        }

        public function getName(): ?string
        {
            return $this->name;
        }

        public function setName(string $name): void
        {
            if(strlen(trim($name)) == 0 )
            {
                throw new ErrorException('nom vide');
            }
            $this->name = $name;
        }



        #Fonctions
    }

?>