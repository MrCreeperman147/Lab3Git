<?php
    #may be depreciated
    class Provide 
    {
        private $equipement;
        private $provider;

        private $qty;
        private $qty_alert;

        
        #Constructeur
        public function __construct(Equipement $equipement, Provider $provider, int $qty, int $qty_alert)
        {
            $this->equipement = $equipement;
            $this->provider = $provider;

            $this->qty = $qty;
            $this->qty_alert = $qty_alert;

        }


        #Accesseurs
        public function getEquipement(): ?Equipement
        {
            return $this->equipement;
        }

        public function getProvider(): ?Provider
        {
            return $this->provider;
        }

        public function getQty(): ?int
        {
            return $this->qty;
        }

        public function getQtyAlert(): ?int
        {
            return $this->qty_alert;
        }

        public function setEquipement(Equipement $equipement): void
        {
            $this->equipement = $equipement;
        }

        public function setProvider(Provider $provider): void
        {
            $this->provider = $provider;
        }

        public function setQty(int $qty): void
        {
            $this->qty = $qty;
        }

        public function setQtyAlert(int $qty_alert): void
        {
            $this->qty = $qty_alert;
        }

        #Fonctions

    }