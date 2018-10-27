<?php
    namespace Controller;

    use Model\Square_Event as Square_Event;
    use Daos\PDOs\Square_EventDaoPdo As Square_EventDaoPdo;

    class Square_EventController
    {
      private $Square_EventData;

      function __construct()
      {
        $this->Square_EventData = new Square_EventDaoPdo();
      }
      public function newSquare_Event()
      {
          require_once("View/newSquare_Event.php");
      }
      public function addSquare_Event($Price,$Remainder,$Quantity_available)
      {
          $Square_EventObject=new Square_Event($Price,$Remainder,$Quantity_available);
          $this->Square_EventData->add($Square_EventObject);
          $this->listSquare_Events();
      }
      public function listSquare_Events()
      {
          foreach ($this->Square_EventData->getAll() as $Square_Event) {
              echo "<br>";
              echo "Precio:".$Square_Event->getPrice()."<br>";
              echo "ID:".$Square_Event->getID()."<br>";
              echo "Remanente:".$Square_Event->getRemainder()."<br>";
              echo "Cantidad disponible:".$Square_Event->getQuantityAvailable()."<br>";
          }
      }
    }

 ?>
