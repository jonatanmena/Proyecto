<?php
    namespace Controller;

    use Model\Place_Event as Place_Event;
    use Daos\PDOs\Place_EventDaoPdo as Place_EventDaoPdo;

    class Place_EventController
    {
        private $Place_EventData;

        public function __construct()
        {
            $this->Place_EventData = new Place_EventDaoPdo();
        }
        public function newPlace_Event()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(ADD_PATH."newPlace_Event.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function listPlace_Events()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listPlace_Events.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function addPlace_Event($Quantity, $Description)
        {
            $Place_EventObject=new Place_Event($Quantity, $Description);
            $this->Place_EventData->add($Place_EventObject);
            $this->listPlace_Events();
        }
    }
