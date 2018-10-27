<?php
    namespace Model;

    class Purchase_Lines
    {
        private $Quantity;
        private $Price;
        private $ID;

        public function __construct($Quantity, $Price, $ID)
        {
          $this->setPrice($Price);
          $this->setQuantity($Quantity);
          $this->setID($ID);
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
        public function setPrice($Price)
        {
            $this->Price = $Price;

            return $this;
        }

        public function getPrice()
        {
            return $this->Price;
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
