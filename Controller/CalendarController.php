<?php
    namespace Controller;

    use Model\Calendar as Calendar;
    use Daos\PDOs\EventDaoPdo as EventDaoPdo;
    use Daos\PDOs\CalendarDaoPdo as CalendarDaoPdo;
    use Daos\PDOs\ArtistDaoPdo as ArtistDaoPdo;

    class CalendarController
    {
        private $CalendarData;
        private $EventData;

        public function __construct()
        {
            $this->EventData = new EventDaoPdo();
            $this->EventData->getAll();
            $this->CalendarData = new CalendarDaoPdo();
        }
        public function newCalendar()
        {
            if (empty($this->EventData->getAll())) {
                require_once("View/newEvent.php");
            }
            require_once("View/newCalendar.php");
        }
        public function addCalendar($Date)
        {
            $CalendarObject=new Calendar($Date);
            $this->CalendarData->add($CalendarObject);
            $this->listCalendars();
        }
        public function listCalendars()
        {
            require_once("View/listCalendars.php");
        }
    }
