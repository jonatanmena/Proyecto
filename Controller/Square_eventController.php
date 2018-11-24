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
                echo '<script language="javascript">';
                echo 'alert("No hay Calendarios cargados ingresa al menos uno")';
                echo '</script>';
                require_once(VIEWS_PATH."nav-bar.php");
                require_once(VIEWS_PATH."footerViejo.php");
            } elseif (empty($this->Square_KindData->getAll())) {
                echo '<script language="javascript">';
                echo 'alert("No hay Tipos de plaza cargados ingresa al menos uno")';
                echo '</script>';
                require_once(VIEWS_PATH."nav-bar.php");
                require_once(ADD_PATH."newSquare_Kind.php");
                require_once(VIEWS_PATH."footerViejo.php");
            }else {
                require_once(VIEWS_PATH."nav-bar.php");
                require_once(ADD_PATH."newSquare_Event.php");
                require_once(VIEWS_PATH."footerViejo.php");
            }

        }
        public function listSquare_Events()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listSquare_Events.php");
            require_once(VIEWS_PATH."footerViejo.php");

        }
        public function addSquare_Event($Price, $Remainder, $Quantity_available, $Square_KindCode, $CalendarCode)
        {
            $Square_EventObject=new Square_Event( $Price,$Remainder,$Quantity_available,
                                                  $this->Square_KindData->GetBySquare_kindCode($Square_KindCode),
                                                  $this->CalendarData->GetByCalendarCode($CalendarCode));
            $this->Square_EventData->add($Square_EventObject);
            $this->listSquare_Events();
        }
    }
