<?php
    namespace Model;

    use Model\Purchase as Purchase;
    use Model\Ticket as Ticket;
    use Model\Square_Event as Square_Event;

    class Purchase_Lines
    {
        private $Quantity;
        private $Price;
        private $ID;
        private $Purchase;
        private $Square_Event;
        private $Ticket;

        public function __construct($Quantity,$Price,$Purchase)
        {
          $this->Quantity = $Quantity;
          $this->Price = $Price;
          $this->Purchase = $Purchase;
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


        public function setPurchase(Purchase $Purchase)
        {
            $this->Purchase=$Purchase;

            return $this;
        }

        public function getPurchase()
        {
            return $this->Purchase;
        }

        public function setTicket(Ticket $Ticket)
        {
            $this->Ticket = $Ticket;

            return $this;
        }

        public function getTicket()
        {
            return $this->Ticket;
        }

        public function setSquareEvent(Square_Event $Square_Event)
        {
            $this->Square_Event = $Square_Event;

            return $this;
        }

        public function getSquareEvent()
        {
            return $this->Square_Event;
        }
    }
