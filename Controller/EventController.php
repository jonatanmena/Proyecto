<?php
    namespace Controller;

    use Model\Event as Event;
    use Daos\PDOs\EventDaoPdo as EventDaoPdo;
    use Daos\PDOs\CategoryDaoPdo as CategoryDaoPdo;

    class EventController
    {
        private $EventData;
        private $CategoryData;

        public function __construct()
        {
            $this->CategoryData = new CategoryDaoPdo();
            $this->CategoryData->getAll();

            $this->EventData = new EventDaoPdo();
        }
        public function newEvent()
        {
            if (empty($this->CategoryData->getAll())) {
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
            require_once("View/listEvents.php");
        }
    }
