<?php
    namespace Model;

    use Model\Client as Client;

    class Purchase
    {
        private $Date;
        private $ID;
        private $Client;

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
    }
