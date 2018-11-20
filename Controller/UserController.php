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
        public function Login($Email, $Password)
        {
            if (isset($Email) && isset($Password)) {
                $user=$this->userData->getIfLoggedSucces($Email,$Password);
                if ($user!=null) {
                    $_SESSION["userLogged"]=$user;
                    header("location:/Second Exam/Home/userLogged");
                } else {
                    header("location:/Second Exam/Home/index");
                }
            }
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
            require_once("View/listUsers.php");
        }
    }
