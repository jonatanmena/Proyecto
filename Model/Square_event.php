<?php
    namespace Model;

    class Square_event
    {
        private $Price;
        private $Remainder;
        private $Quantity_available;
        private $ID;

        public function __construct($Price, $Remainder, $Quantity_available,$ID = 0)
        {
          $this->setPrice($Price);
          $this->setRemainder($Remainder);
          $this->setQuantityAvailable($Quantity_available);
          $this->setID($ID);
        }

        public function setPrice($Price)
        {
            $this->Price = $Price;

            return $this;
        }
        public function getPrice()
        {
            return $this->Price;
        }
        public function setRemainder($Remainder)
        {
            $this->Remainder = $Remainder;

            return $this;
        }
        public function getRemainder()
        {
            return $this->Remainder;
        }
        public function setQuantityAvailable($Quantity_available)
        {
            $this->Quantity_available = $Quantity_available;

            return $this;
        }
        public function getQuantityAvailable()
        {
            return $this->Quantity_available;
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
