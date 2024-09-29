<?php 

    use ErrorException;

    class Provider
    {
        private $id;

        private $name;
        private $location;

        #Constructeur
        public function __construct(int $id, string $name, string $location)
        {
            $this->id = $id;
            $this->name = $name;
            $this->location = $location;

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

        public function getLocation(): ?string
        {
            return $this->location;
        }

        public function setName(string $name): void
        {
            if(strlen(trim($name)) == 0 )
            {
                throw new ErrorException('nom vide');
            }
            $this->name = $name;
        }

        public function setLocation(string $location): void
        {
            if(strlen(trim($location)) == 0 )
            {
                throw new ErrorException('nom de l\'emplacement vide');
            }
            $this->location = $location;
        }

        #Fonctions
    }

?>