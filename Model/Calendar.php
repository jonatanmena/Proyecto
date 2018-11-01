<?php
    namespace Model;

    class Calendar
    {
        private $date;
        private $ID;

        public function __construct($date)
        {
            $this->setDate($date);

        }
        public function setDate($date)
        {
            $this->date = $date;

            return $this;
        }

        public function getDate()
        {
            return $this->date;
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
