<?php
    namespace Controller;


    class Maincontroller
    {

      public function __construct()
      {

      }
      public function index()
      {
        require("view\main.php");
      }
      public function userLogged()
      {

        var_dump($_SESSION);

      }

      public function logout()
      {
      session_destroy();
      $this->index();
      }
    }


?>
