<?php
    namespace Model;

    class Purchase
    {
        private $Date;
        private $ID;

        function __construct($Date,$ID)
        {
          $this->setDate($Date);
          $this->setID($ID);
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

}
?>
