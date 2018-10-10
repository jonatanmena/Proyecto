<?php
    namespace Model;

    class Ticket
    {
        private $Number;
        private $QR;
        private $ID;

        public function __construct($Number, $QR ,$ID)
        {
          $this->setNumber($Number);
          $this->setQR($QR);
          $this->setID($ID);
        }
        public function setNumber($Number)
        {
            $this->Number = $Number;

            return $this;
        }
        public function getNumber()
        {
            return $this->Number;
        }
        public function setQR($QR)
        {
            $this->QR = $QR;

            return $this;
        }

        public function getQR()
        {
            return $this->QR;
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
