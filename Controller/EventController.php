<?php
    namespace Controller;

    use Model\Event as Event;
    use Daos\PDOs\EventDaoPdo As EventDaoPdo;

    class EventController
    {
      private $EventData;

      function __construct()
      {
        $this->EventData = new EventDaoPdo();
      }
      public function newEvent()
      {
          require_once("View/newEvent.php");
      }
      public function addEvent($title)
      {
          $EventObject=new Event($title);
          $this->EventData->add($EventObject);
          $this->listEvents();
      }
      public function listEvents()
      {
          foreach ($this->EventData->GetAll() as $Event) {
              echo "<br>";
              echo "Titulo:".$Event->getTitle()."<br>";
              echo "ID::".$Event->getID()."<br>";
          }
          echo '<a href="../Event/newEvent"> Boton </a>';
      }
    }

 ?>
