<?php
    namespace Model;

    use Model\Client as Client;

    class Purchase
    {
        private $Date;
        private $ID;
        private $Client;
        private $Status;

        public function __construct($Date,$Client,$Status = NULL)
        {
          $this->Date = $Date;
          $this->Client = $Client;
          if(NULL === $Status){
            $Status = "Activo";
          }
          $this->Status = $Status;
        }
        public function setDate($Date)
        {
            $this->Date = $Date;

            return $this;
        }
        public function getDate()
        {
            return $this->Date;
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


        public function setClient(Client $Client)
        {
            $this->Client = $Client;

            return $this;
        }

        public function getClient()
        {
            return $this->Client;
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
