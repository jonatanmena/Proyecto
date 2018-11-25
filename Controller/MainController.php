<?php
    namespace Controller;


    use Daos\PDOs\EventDaoPdo as EventDaoPdo;
    use Daos\PDOs\CalendarDaoPdo as CalendarDaoPdo;

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
      public function purchaseByEvent($EventCode){
        $CalendarData = new CalendarDaoPdo();
        $CalendarList = $CalendarData->GetByEventCode($EventCode);
        require_once(VIEWS_PATH."purchaseByEvent.php");
      }

      public function logout()
      {
      unset($_SESSION["userLogged"]);
      unset($_SESSION["Purchase_Lines"]);
      session_destroy();
      $this->index();
      }
    }


?>
