<?php
    namespace Model;

    class User
    {
        private $User;
        private $Password;
        private $Privilege;
        private $ID;
        private $Status;

        public function __construct ($User,$Password,$Privilege,$Status = "Activo")
        {
            $this->User = $User;
            $this->Password = $Password;
            $this->Privilege = $Privilege;
            $this->Status = $Status;
        }
        public function getUser()
        {
            return $this->User;
        }
        public function setPassword($Password)
        {
            $this->Password = $Password;

            return $this;
        }
        public function getPassword()
        {
            return $this->Password;
        }
        public function setPrivilege($Privilege)
        {
            $this->Privilege = $Privilege;

            return $this;
        }
        public function getPrivilege()
        {
            return $this->Privilege;
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

        public function setUser($User)
        {
            $this->User = $User;

            return $this;
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
