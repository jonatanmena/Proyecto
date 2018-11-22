<?php
    namespace Model;
    // TODO: Entidad Ciudad
    class Place_Event
    {
        private $Quantity;
        private $Description;
        private $ID;
        private $Status;

        public function __construct($Quantity, $Description, $Status = "Activo")
        {
        $this->Quantity = $Quantity;
        $this->Description = $Description;
        $this->Status = $Status;
        }

        public function setQuantity($Quantity)
        {
            $this->Quantity = $Quantity;

            return $this;
        }
        public function getQuantity()
        {
            return $this->Quantity;
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
        
        public function getStatus()
        {
            return $this->Status;
        }

        public function setStatus($Status)
        {
            $this->Status = $Status;

            return $this;
        }

}




 ?>
