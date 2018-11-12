<?php
    namespace Daos\Interfaces;

    use Model\CalendarXArtist as CalendarXArtist;

    interface ICalendarXArtistDao
    {
        public function Add(CalendarXArtist $CalendarXArtist);
        public function Delete($ArtistCode, $CalendarCode);
        public function GetByCalendarXArtistCode($ArtistCode, $CalendarCode);
        public function getAll();
    }
