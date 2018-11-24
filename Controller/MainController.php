<?php
    namespace Controller;


    class Maincontroller
    {

      public function __construct()
      {

      }
      public function index()
      {
        if(isset($_SESSION["userLogged"]) && $_SESSION["userLogged"]->getPrivilege()==1){
            $this->adminPage();
        }else {
          require(VIEWS_PATH."main.php");
        }

      }
      public function adminPage()
      {
        require(VIEWS_PATH.'\nav-bar.php');
      }

      public function logout()
      {
      unset($_SESSION["userLogged"]);
      session_destroy();
      $this->index();
      }
    }


?>
