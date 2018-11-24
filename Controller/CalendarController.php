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
        }
        public function newCalendar()
        {
            if (empty($this->EventData->getAll())) {
              echo '<script language="javascript">';
              echo 'alert("No hay Eventos cargados ingresa al menos uno")';
              echo '</script>';
              require_once(VIEWS_PATH."nav-bar.php");
              require_once(VIEWS_PATH."footerViejo.php");
            }else {
              require_once(VIEWS_PATH."nav-bar.php");
              require_once(ADD_PATH."newCalendar.php");
              require_once(VIEWS_PATH."footerViejo.php");
            }

        }
        public function listCalendars()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listCalendars.php");
            require_once(VIEWS_PATH."footerViejo.php");
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
                echo '<script language="javascript">';
                echo 'alert("Ese calendario con ese ID de Evento e ID de lugar de Evento para esa fecha ya existe")';
                echo '</script>';
                $this->newCalendar();
              }

        }

    }
