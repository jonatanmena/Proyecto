<?php
    namespace Controller;


    class Maincontroller
    {

      function __construct()
      {

      }
      public function index()
      {
        require_once("view\main.php");
      }
      public function userLogged()
      {
        if($_SESSION["userLogged"]->getPrivilege()=="Admin"){
          require_once("adminMain.php");
        }elseif($_SESSION["userLogged"]->getPrivilege()=="User"){
          require_once("userMain.php");
        }
      }

      public function logout()
      {
      session_destroy();
      $this->index();
      }
    }


?>
