<?php
    namespace Controller;

    use Model\Square_Event as Square_Event;
    use Daos\PDOs\CalendarDaoPdo as CalendarDaoPdo;
    use Daos\PDOs\Square_kindDaoPdo as Square_kindDaoPdo;
    use Daos\PDOs\Square_EventDaoPdo as Square_EventDaoPdo;

    class Square_EventController
    {
        private $Square_EventData;
        private $Square_KindData;
        private $CalendarData;


        public function __construct()
        {
            $this->CalendarData = new CalendarDaoPdo();
            $this->CalendarData->getAll();
            $this->Square_KindData = new Square_kindDaoPdo();
            $this->Square_KindData->getAll();
            $this->Square_EventData = new Square_EventDaoPdo();
        }
        public function newSquare_Event()
        {
            if (empty($this->CalendarData->getAll())) {
                echo "<script> alert('No hay calendarios cargados!');</script>";
                require_once("View/main.php");
            } elseif (empty($this->Square_KindData->getAll())) {
                require_once("View/newSquare_Kind.php");
            }
            require_once("View/newSquare_Event.php");
        }
        public function addSquare_Event($Price, $Remainder, $Quantity_available, $Square_KindCode, $CalendarCode)
        {
            $Square_EventObject=new Square_Event( $Price,$Remainder,$Quantity_available,
                                                  $this->Square_KindData->GetBySquare_kindCode($Square_KindCode),
                                                  $this->CalendarData->GetByCalendarCode($CalendarCode));            
            $this->Square_EventData->add($Square_EventObject);
            $this->listSquare_Events();
        }
        public function listSquare_Events()
        {
            require_once("View/listSquare_Events.php");
        }
    }
