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
        private $ArtistData;

        public function __construct()
        {
            $this->ArtistData = new ArtistDaoPdo();
            $this->ArtistData->getAll();
            $this->EventData = new EventDaoPdo();
            $this->EventData->getAll();


            $this->CalendarData = new CalendarDaoPdo();
        }
        public function newCalendar()
        {
            if (empty($this->EventData->getAll())) {
                require_once("View/newEvent.php");
            } elseif (empty($this->ArtistData->GetAll())) {
                require_once("View/newArtist.php");
            } else {
                require_once("View/newCalendar.php");
            }
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
            /*
                    foreach ($this->CalendarData->getAll() as $Calendar)
                    {
                        echo "<br>";
                        echo "Fecha:".$Calendar->getDate()."<br>";
                        echo "ID:".$Calendar->getID()."<br>";
                    }

                    */
        }
    }
