<?php
    namespace Controller;

    use Model\Calendar as Calendar;
    use Daos\PDOs\CalendarDaoPdo as CalendarDaoPdo;

    class CalendarController
    {
        private $CalendarData;

        public function __construct()
        {
            $this->CalendarData = new CalendarDaoPdo();
        }
        public function newCalendar()
        {
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
            foreach ($this->CalendarData->getAll() as $Calendar)
            {
                echo "<br>";
                echo "Fecha:".$Calendar->getDate()."<br>";
                echo "ID:".$Calendar->getID()."<br>";
            }
        }
    }
