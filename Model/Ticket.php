<?php
    namespace Model;

    class Ticket
    {
        private $Number;
        private $QR;
        private $ID;
        private $Status;

        public function __construct($Number,$QR,$Status = "Activo")
        {
          $this->Number = $Number;
          $this->QR = $QR;
          $this->Status = $Status;
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
