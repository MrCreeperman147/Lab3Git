<?php

    use DateTime;

    class OrderStateHistory
    {
        private $user;
        private $equipement;
        private $orderState;

        private $dateState;


        #Constructeur
        public function __construct()
        {
        }

        #Accesseurs
        public function getUser(): User
        {
            return $this->user;
        }

        public function getEquipement(): Equipement
        {
            return $this->equipement;
        }

        public function getOrderState(): OrderState
        {
            return $this->orderState;
        }

        public function getDateState(): DateTime
        {
            return $this->dateState;
        }
    }

?>