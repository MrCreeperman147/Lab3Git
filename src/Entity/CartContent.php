<?php

    use DateTime;

    class CartContent
    {
        private $user;
        private $equipement;

        private $dateAdded;
        private $dateUpdated;
        private $qty;

        
        #Constructeur
        public function __construct()
        {
        }

        
        #Accesseurs
        public function getUser(): User
        {
            return $this->user;
        }

        public function getEquipement(): Equipemement
        {
            return $this->equipement;
        }

        public function getDateAdded(): DateTime
        {
            return $this->dateAdded;
        }

        public function getDateUpdated(): DateTime
        {
            return $this->dateUpdated;
        }

        public function getQty(): ?int
        {
            return $this->qty;
        }

        public function setEquipement(Equipement $equipement): void
        {
            $this->equipement = $equipement;
        }

        public function setDateUpdated(DateTime $dateUpdated): void
        {
            $this->dateUpdated = $dateUpdated;
        }

        public function setQty(int $qty): void
        {
            $this->qty = $qty;
        }

    }

?>