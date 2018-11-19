<?php
    namespace Controller;

    use Model\Calendar as Calendar;
    use Daos\PDOs\EventDaoPdo as EventDaoPdo;
    use Daos\PDOs\CalendarDaoPdo as CalendarDaoPdo;
    use Daos\PDOs\ArtistDaoPdo as ArtistDaoPdo;
    use Daos\PDOs\Place_EventDaoPdo as Place_EventDaoPdo;
    use Daos\PDOs\Square_EventDaoPdo as Square_EventDaoPdo;

    class CalendarController
    {
        private $CalendarData;
        private $EventData;
        private $Place_EventData;
        private $Square_EventData;
        private $Artist_Data;

        public function __construct()
        {
            $this->CalendarData = new CalendarDaoPdo();
            $this->EventData = new EventDaoPdo();
            $this->Place_EventData = new Place_EventDaoPdo();
            $this->Square_EventData = new Square_EventDaoPdo();
            $this->ArtistData = new ArtistDaoPdo();
            $this->EventData->getAll();
        }
        public function newCalendar()
        {
            if (empty($this->EventData->getAll())) {
                require_once("View/newEvent.php");
            }
            require_once("View/newCalendar.php");
        }
        public function addCalendar($Date, $EventCode, $Place_EventCode)
        {
            $CalendarObject = new Calendar($Date,$this->EventData->GetByEventCode($EventCode),$this->Place_EventData->GetByPlace_eventCode($Place_EventCode));
            /*
            $CalendarObject->setDate($Date);
            $CalendarObject->setEvent($this->EventData->GetByEventCode($EventCode));
            $CalendarObject->setPlaceEvent($this->Place_EventData->GetByPlace_eventCode($Place_EventCode));
            */
            $this->CalendarData->add($CalendarObject);
            $this->listCalendars();
        }
        public function listCalendars()
        {
            require_once("View/listCalendars.php");
        }
    }
