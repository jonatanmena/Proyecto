<?php
    namespace Controller;

    use Model\Event as Event;
    use Daos\PDOs\EventDaoPdo As EventDaoPdo;
    use Daos\PDOs\CategoryDaoPdo As CategoryDaoPdo;

    class EventController
    {
      private $EventData;
      private $CategoryData;

      function __construct()
      {

        $this->CategoryData = new CategoryDaoPdo();
        $this->CategoryData->getAll();

        $this->EventData = new EventDaoPdo();

      }
      public function newEvent()
      {
          if(empty($this->CategoryData->getAll()))
          {
            require_once("View/newCategory.php");
          }
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
          /*
          foreach ($this->EventData->GetAll() as $Event)
          {
              echo "<br>";
              echo "Titulo:".$Event->getTitle()."<br>";
              echo "ID::".$Event->getID()."<br>";
          }
          echo '<a href="../Event/newEvent"> Boton </a>';
          */
      }
}

 ?>
