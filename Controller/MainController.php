<?php
    namespace Controller;
    use Daos\PDOs\EventDaoPdo as EventDaoPdo;

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
          require_once(VIEWS_PATH."main.php");
        }

      }
      public function adminPage()
      {
        require_once(VIEWS_PATH.'\nav-bar.php');
      }
      public function purchase(){
        $EventData = new EventDaoPdo();        
        require_once(VIEWS_PATH."purchase.php");
      }

      public function logout()
      {
      unset($_SESSION["userLogged"]);
      session_destroy();
      $this->index();
      }
    }


?>
