<?php
    namespace Model;

    class Square_Kind
    {
        private $Description;
        private $ID;
        private $Status;

        public function __construct($Description,$Status = NULL)
        {
          $this->Description = $Description;
          if(NULL === $Status){
            $Status = "Activo";
          }
          $this->Status = $Status;
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
