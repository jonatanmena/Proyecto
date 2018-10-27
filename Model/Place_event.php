<?php
    namespace Model;

    class Place_Event
    {
        private $Quantity;
        private $Description;
        private $ID;

        function __construct($Quantity,$Description,$ID)
        {
          $this->setQuantity($Quantity);
          $this->setDescription($Description);
          $this->setId($ID);
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

}




 ?>
