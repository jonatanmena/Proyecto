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

            $Calendar = NULL;
            $Calendar = $this->CalendarData->ValidateCalendar($Date,$EventCode,$Place_EventCode);
              if($Calendar == NULL)
              {
                $CalendarObject = new Calendar( $Date,
                                                $this->EventData->GetByEventCode($EventCode),
                                                $this->Place_EventData->GetByPlace_eventCode($Place_EventCode));

                $this->CalendarData->add($CalendarObject);
                $this->listCalendars();
              }else {
                require("view/newCalendar.php");
                echo '<script language="javascript">';
                echo 'alert("Ese calendario con ese ID de Evento e ID de lugar de Evento para esa fecha ya existe")';
                echo '</script>';
              }

              /*
              $CalendarObject = new Calendar( $Date,
                                              $this->EventData->GetByEventCode($EventCode),
                                              $this->Place_EventData->GetByPlace_eventCode($Place_EventCode));

              $this->CalendarData->add($CalendarObject);
              $this->listCalendars();
              */

        }
        public function listCalendars()
        {
            require_once("View/listCalendars.php");
        }
    }
