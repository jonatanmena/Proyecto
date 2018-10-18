<?php
    namespace Controller;

    use Model\Calendar as Calendar;
    //use Daos\Lists\ListCalendarDao as CalendarList;

    use Daos\PDOs\CalendarDaoPdo as CalendarList;

    class CalendarController
    {
        private $CalendarData;

        public function __construct()
        {
            $this->CalendarData=CalendarList::getInstance();
        }
        public function newCalendar()
        {
            require_once("View/newCalendar.php");
        }
        public function addCalendar($Date,$CalendarCode)
        {
            $CalendarObject=new Calendar($Date,$CalendarCode);
            $this->CalendarData->add($CalendarObject);
            $this->listCalendars();
        }
        public function listCalendars()
        {
            foreach ($this->CalendarData->getAll() as $Calendar)
            {
                echo "<br>";
                echo "Fecha:".$Calendar->getDate()."<br>";
                echo "Codigo:".$Calendar->getID()."<br>";
            }
        }
    }
