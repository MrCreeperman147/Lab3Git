<?php

    class Equipement
    {
        private $id;

        private $name;
        private $price;
        private $weight;
        private $description;
        private $protectionClass;
        private $nbPocket;

        #object
        private $manufacturer;
        private $typeEquipement;

        #list
        private $images = array();        #attach
        private $materials = array();     #combine
        private $bodyParts = array();     #cover


        #Constructeur
        public function __construct(int $id, string $name, float $price, int $weight, string $description, int $protectionClass, int $nbPocket,
                                    TypeEquipement $typeEquipement)
        {
            $this->id = $id;

            $this->name = $name;
            $this->price = $price;
            $this->weight = $weight;
            $this->description = $description;
            $this->protectionClass = $protectionClass;
            $this->nbPocket = $nbPocket;

            $this->typeEquipement = $typeEquipement;
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

        public function getPrice(): ?float
        {
            return $this->price;
        }

        public function getWeight(): ?int
        {
            return $this->weight;
        }

        public function getDescription(): ?string
        {
            return $this->description;
        } 

        public function getProtectionClass(): ?int
        {
            return $this->protectionClass;
        }

        public function getNbPocket(): ?int
        {
            return $this->nbPocket;
        }


        public function getManufacturer(): ?Manufacturer
        {
            return $this->manufacturer;
        }

        public function getTypeEquipement(): ?TypeEquipement
        {
            return $this->typeEquipement;
        }


        public function getImages(): ?array
        {
            $retour = array();

            foreach($this->images as $value)
            {
                $retour[] = $value;
            }

            unset($value);
            return $retour;
        }

        public function getMaterials(): ?array
        {
            $retour = array();

            foreach($this->materials as $value)
            {
                $retour[] = $value;
            }

            unset($value);
            return $retour;
        }

        public function getBodyParts(): ?array
        {
            $retour = array();

            foreach($this->bodyParts as $value)
            {
                $retour[] = $value;
            }

            unset($value);
            return $retour;
        }

        public function setName(string $name): void
        {
            if(strlen(trim($name)) == 0)
            {
                throw new Exception('Nom vide');
            }
            $this->name = $name;
        }

        public function setPrice(float $price): void
        {
            $this->price = $price;
        }

        public function setWeight(int $weight): void
        {
            $this->weight = $weight;
        }

        public function setDescription(string $description): void
        {
            $this->description = $description;
        }

        public function setProtectionClass(int $protectionClass): void
        {
            $this->protectionClass = $protectionClass;
        }

        public function setNbPocket(int $nbPocket): void
        {
            $this->nbPocket = $nbPocket;
        }

        public function setManfacturer(Manufacturer $manufacturer): void
        {
            $this->manufacturer = $manufacturer;
        }

        public function setTypeEquipement(TypeEquipement $typeEquipement): void
        {
            $this->typeEquipement = $typeEquipement;
        }

        public function addImage(Image $image): void
        {
            if(in_array($image, $this->images) == true)
            {
                throw new Exception('Image déjà liée à l\'objet');
            }
            $this->images[] = $image;
        }

        public function addMaterial(Material $material): void
        {
            if(in_array($material, $this->materials) == true )
            {
                throw new Exception('Materiel déjà liée à l\'objet');
            }
            $this->materials[] = $material;
        }

        public function addBodyPart(BodyPart $bodyPart): void
        {
            if(in_array($bodyPart, $this->bodyParts) == true )
            {
                throw new Exception('Partie du corps déjà liée à l\'objet');
            }
            $this->bodyParts[] = $bodyPart;
        }

        public function removeImage(Image $image): void
        {
            if(in_array($image, $this->images) == false )
            {
                throw new Exception('Image non liée à l\'objet');
            }

            unset($this->images[array_search($image, $this->images)]);
            array_filter($this->images);
        }

        public function removeMaterial(Material $material): void
        {
            if(in_array($material, $this->materials) == false )
            {
                throw new Exception('Materiel non liée à l\'objet');
            }

            unset($this->materials[array_search($material, $this->materials)]);
            array_filter($this->materials);

        }

        public function removeBodyPart(BodyPart $bodyPart): void
        {
            if(in_array($bodyPart, $this->bodyParts) == false )
            {
                throw new Exception('Partie du corps non liée à l\'objet');
            }

            unset($this->bodyParts[array_search($bodyPart, $this->bodyParts)]);
            array_filter($this->bodyParts);
        }
    }

?>