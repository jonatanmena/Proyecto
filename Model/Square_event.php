<?php
    namespace Model;

    use Model\Square_Kind as Square_Kind;
    use Model\Calendar as Calendar;

    class Square_event
    {
        private $Price;
        private $Remainder;
        private $Quantity_available;
        private $ID;
        private $Square_Kind;
        private $Calendar;

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


        public function setSquareKind(Square_Kind $Square_Kind)
        {
            $this->Square_Kind = $Square_Kind;

            return $this;
        }

        public function getSquareKind()
        {
            return $this->Square_Kind;
        }

        public function setCalendar($Calendar)
        {
            $this->Calendar = $Calendar;

            return $this;
        }

        public function getCalendar()
        {
            return $this->Calendar;
        }
    }
