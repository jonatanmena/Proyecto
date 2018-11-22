<?php
    namespace Model;

    class Category
    {
        private $Description;
        private $ID;
        private $Status;

        public function __construct($Description,$Status = "Activo")
        {
            $this->Description = $Description;
            $this->Status = $Status;
        }

        public function setDescription($Description)
        {
            $this->Description = $Description;

            return $this;
        }
        public function getDescription()
        {
            return $this->Description;
        }

        public function setID($ID)
        {
            $this->ID = $ID;

            return $this;
        }
        public function getID()
        {
            return $this->ID;
        }
    }
?>
