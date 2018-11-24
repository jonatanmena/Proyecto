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
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(ADD_PATH."newUser.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }

        public function listUsers()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listUsers.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function Login($Email, $Password)
        {
            if (isset($Email) && isset($Password)) {
                $user=$this->UserData->getIfLoggedSucces($Email, $Password);
                if ($user!=null) {
                    $_SESSION["userLogged"]=$user;
                    header("location:/Proyecto/Main/index");
                } else {
                    echo "<script> if(alert('Datos incorrectos!'));</script>";
                    header("location:/Proyecto/Main/index");
                }
            }
        }
        public function addUser($User, $Password, $Privilege)
        {
            $UserObject = new User($User, $Password, $Privilege);
            $this->UserData->add($UserObject);
            $this->listUsers();
        }
    }
