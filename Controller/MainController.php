<?php
    namespace Controller;

    use Model\SquareEvent as SquareEvent;
    use Model\Purchase_Lines as Purchase_Lines;
    use Daos\PDOs\Square_EventDaoPdo as Square_EventDaoPdo;
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
      public function addPurchaseToCart($SquareEventCode){
        if(count($_SESSION["Purchase_Lines"])<5){

          $Square_EventData = new Square_EventDaoPdo();
          $EventData = new EventDaoPdo();
          $SquareEventObject = $Square_EventData->GetBySquare_EventCode($SquareEventCode);

          $Purchase_Lines = new Purchase_Lines( 1,
                                                $SquareEventObject->getPrice());
          $Purchase_Lines->setSquareEvent($SquareEventObject);

          $EventCode = $Purchase_Lines->getSquareEvent()->getCalendar()->getEvent();

          $Purchase_Lines->getSquareEvent()->getCalendar()->setEvent($EventData->GetByEventCode($EventCode));


          array_push($_SESSION["Purchase_Lines"],$Purchase_Lines);
          if(!isset($_SESSION["TotalPurchase"])){
            $_SESSION["TotalPurchase"] = 0.00;
            $TotalPurchase = $_SESSION["TotalPurchase"];
            $TotalPurchase = $TotalPurchase + $Purchase_Lines->getPrice();
            $_SESSION["TotalPurchase"] = $TotalPurchase;
          }else {
            $TotalPurchase = $_SESSION["TotalPurchase"];
            $TotalPurchase = $TotalPurchase + $Purchase_Lines->getPrice();
            $_SESSION["TotalPurchase"] = $TotalPurchase;
          }
          /*
          echo '<script language="javascript">';
          echo 'alert("'.$SquareEventObject->getCalendar()->getEvent()->getTitle().' se agrego al carrito correctamente.")';
          echo '</script>';
          echo ";
          */
          echo '
          <script type="text/javascript">
          alert("Se agrego al carrito correctamente.");
          location="'.FRONT_ROOT.'main/purchase";
          </script>
          ';

          //header("location:/Proyecto/Main/purhcase");
          //$this->purchase();
        }else {
          echo '
          <script type="text/javascript">
          alert("El carrito se encuentra lleno, finalice la compra.");
          location="'.FRONT_ROOT.'main/purchase";
          </script>
          ';
        }
      }

      public function logout()
      {
      unset($_SESSION["userLogged"]);
      unset($_SESSION["Purchase_Lines"]);
      unset($_SESSION["TotalPurchase"]);
      session_destroy();
      $this->index();
      }
    }


?>
