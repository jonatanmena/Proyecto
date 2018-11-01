<?php
    namespace Controller;

    use Model\Place_Event as Place_Event;
    use Daos\PDOs\Place_EventDaoPdo As Place_EventDaoPdo;

    class Place_EventController
    {
      private $Place_EventData;

      function __construct()
      {
        $this->Place_EventData = new Place_EventDaoPdo();
      }
      public function newPlace_Event()
      {
          require_once("View/newPlace_Event.php");
      }
      public function addPlace_Event($Quantity,$Description)
      {
          $Place_EventObject=new Place_Event($Quantity,$Description);
          $this->Place_EventData->add($Place_EventObject);
          $this->listPlace_Events();
      }
      public function listPlace_Events()
      {
          foreach ($this->Place_EventData->GetAll() as $Place_Event) {
              echo "<br>";
              echo "Cantidad:".$Place_Event->getQuantity()."<br>";
              echo "Descripcion:".$Place_Event->getDescription()."<br>";
              echo "ID:".$Place_Event->getID()."<br>";
          }
          echo '<a href="../Place_Event/newPlace_Event"> Boton </a>';
      }
    }

 ?>
