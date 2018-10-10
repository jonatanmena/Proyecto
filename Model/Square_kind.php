<?php
    namespace Model;

    class Square_kind
    {
        private $Description;
        private $ID;

        public function __construct($Description,$ID)
        {
          $this->setDescription($Description);
          $this->setID($ID);
        }
        public function setDescription($Description)
        {
            $this->Description = $Description;

            return $this;
        }
        public function getDescription()
        {
            return $this->Description;
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
