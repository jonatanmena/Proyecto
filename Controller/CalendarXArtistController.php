<?php
    namespace Controller;

    use Model\CalendarXArtist as CalendarXArtist;
    use Daos\PDOs\CalendarXArtistDaoPdo as CalendarXArtistDaoPdo;

    class CalendarXArtistController
    {
        private $CalendarXArtistData;

        public function __construct()
        {
            $this->CalendarXArtistData = new CalendarXArtistDaoPdo();
        }
        public function newCalendarXArtist()
        {
            require_once("View/newCalendarXArtist.php");
        }
        public function addCalendarXArtist($ID_Artist, $ID_Calendar)
        {
            $CalendarXArtistObject=new CalendarXArtist($ID_Artist, $ID_Calendar);
            $this->CalendarXArtistData->add($CalendarXArtistObject);
            $this->listCalendarXArtists();
        }
        public function listCalendarXArtists()
        {
            require_once("View/listCalendarXArtists.php");
        }
    }
