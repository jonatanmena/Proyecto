<?php
    namespace Controller;

    use Model\Calendar as Calendar;
    use Daos\PDOs\EventDaoPdo as EventDaoPdo;
    use Daos\PDOs\CalendarDaoPdo as CalendarDaoPdo;
    use Daos\PDOs\ArtistDaoPdo as ArtistDaoPdo;
    use Daos\PDOs\Place_EventDaoPdo as Place_EventDaoPdo;

    class CalendarController
    {
        private $CalendarData;
        private $EventData;
        private $Place_EventData;

        public function __construct()
        {
            $this->CalendarData = new CalendarDaoPdo();
            $this->EventData = new EventDaoPdo();
            $this->Place_EventData = new Place_EventDaoPdo();
            $this->EventData->getAll();
        }
        public function newCalendar()
        {
            if (empty($this->EventData->getAll())) {
                require_once("View/newEvent.php");
            }
            require_once("View/newCalendar.php");
        }
        public function addCalendar($Date, $Event, $Place_Event)
        {
            $CalendarObject=new Calendar($Date, $this->EventData->GetByEventCode($Event), $this->Place_EventData->GetByPlace_eventCode($Place_Event));
            $this->CalendarData->add($CalendarObject);
            $this->listCalendars();
        }
        public function listCalendars()
        {
            require_once("View/listCalendars.php");
        }
    }
