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
            $this->CalendarData->getAll();
            $this->ArtistData = new ArtistDaoPdo();
            $this->ArtistData->getAll();
        }
        public function newCalendarXArtist()
        {
            require_once("View/newCalendarXArtist.php");
        }
        public function addCalendarXArtist($ID_Artist, $ID_Calendar)
        {
            $CalendarXArtistObject=new CalendarXArtist($this->ArtistData->GetByArtistCode($ID_Artist),$this->CalendarData->getByCalendarCode($ID_Calendar));
            $this->CalendarXArtistData->add($CalendarXArtistObject);
            $this->listCalendarXArtists();
        }
        public function listCalendarXArtists()
        {
            require_once("View/listCalendarXArtists.php");
        }
    }
