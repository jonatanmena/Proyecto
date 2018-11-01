<?php
    namespace Controller;

    use Model\User as User;
    use Daos\PDOs\UserDaoPdo as UserDaoPdo;

    class UserController
    {
        private $UserData;

        public function __construct()
        {
            $this->UserData= new UserDaoPdo();
        }
        public function newUser()
        {
            require_once("View/newUser.php");
        }
        public function addUser($User, $Password, $Privilege)
        {
            $UserObject = new User($User, $Password, $Privilege);
            $this->UserData->add($UserObject);
            $this->listUsers();
        }
        public function listUsers()
        {
            foreach ($this->UserData->getAll() as $User) {

                echo "<br>";
                echo "Usuario:".$User->getUser()."<br>";
                echo "Password:".$User->getPassword()."<br>";
                echo "Privilegio:".$User->getPrivilege()."<br>";
                echo "ID:".$User->getID()."<br>";

            }
        }
    }
