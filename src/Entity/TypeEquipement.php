<?php 

    use ErrorException;

    class TypeEquipement
    {
        private $id;

        private $libelle;


        #Constructeur
        public function __construct()
        {
        }

        #Accesseurs
        public function getId(): ?int
        {
            return $this->id;
        }

        public function getLibelle(): ?string
        {
            return $this->libelle;
        }

        public function setLibelle(string $libelle): void
        {
            if(strlen(trim($libelle)) == 0 )
            {
                throw new ErrorException('libelle vide');
            }
            $this->libelle = $libelle;
        }


        #Fonctions
    }

?>