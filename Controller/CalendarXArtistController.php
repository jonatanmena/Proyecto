<?php
    namespace Controller;

    use Model\CalendarXArtist as CalendarXArtist;
    use Daos\PDOs\CalendarXArtistDaoPdo as CalendarXArtistDaoPdo;
    use Daos\PDOs\ArtistDaoPdo as ArtistDaoPdo;
    use Daos\PDOs\CalendarDaoPdo as CalendarDaoPdo;

    class CalendarXArtistController
    {
        private $CalendarXArtistData;

        public function __construct()
        {
            $this->CalendarXArtistData = new CalendarXArtistDaoPdo();
            $this->CalendarData = new CalendarDaoPdo();
            $this->ArtistData = new ArtistDaoPdo();
        }
        public function newCalendarXArtist()
        {
          if ( empty($this->CalendarData->getAll()) || empty($this->ArtistData->getAll()) ) {
              echo '<script language="javascript">';
              echo 'alert("No hay Artistas o Categorias cargadas ingresa al menos uno de cada uno")';
              echo '</script>';
              require_once(VIEWS_PATH."nav-bar.php");
              require_once(VIEWS_PATH."footerViejo.php");
          }else {
              require_once(VIEWS_PATH."nav-bar.php");
              require_once(ADD_PATH."newCalendarXArtist.php");
              require_once(VIEWS_PATH."footerViejo.php");
          }
        }

        public function listCalendarXArtists()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listCalendarXArtists.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function addCalendarXArtist($ID_Artist, $ID_Calendar)
        {
            $CalendarXArtistObject=new CalendarXArtist($this->ArtistData->GetByArtistCode($ID_Artist),$this->CalendarData->getByCalendarCode($ID_Calendar));
            $this->CalendarXArtistData->add($CalendarXArtistObject);
            $this->listCalendarXArtists();
        }
    }
