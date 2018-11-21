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
                $user=$this->UserData->getIfLoggedSucces($Email,$Password);
                if ($user!=null) {
                    $_SESSION["userLogged"]=$user;
                    header("location:/Proyecto/Main/index");
                } else {
                    echo "<script> if(alert('Datos incorrectos!'));</script>";

                    header("location:/Proyecto/Main/index");
                }
            }
        }
        public function newUser()
        {
            require_once("View/newUser.php");
        }
        public function addUser($User, $Password, $Privilege)
        {
            echo $User;
            echo $Password;
            echo $Privilege;

            $UserObject = new User($User, $Password, $Privilege);
            //var_dump($UserObject);
            $this->UserData->add($UserObject);
            $this->listUsers();
        }
        public function listUsers()
        {
            require_once("View/listUsers.php");
        }
    }
