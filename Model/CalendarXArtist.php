<?php
    namespace Model;

    class CalendarXArtist
    {
      private $ID_Artist;
      private $ID_Calendar;

      function __construct($ID_Artist,$ID_Calendar)
      {
          $this->setIDArtist($ID_Artist);
          $this->setIDCalendar($ID_Calendar);
      }

      public function setIDArtist($ID_Artist)
      {
          $this->ID_Artist = $ID_Artist;

          return $this;
      }

      public function getIDArtist()
      {
          return $this->ID_Artist;
      }

      public function setIDCalendar($ID_Calendar)
      {
          $this->ID_Calendar = $ID_Calendar;

          return $this;
      }

      public function getIDCalendar()
      {
          return $this->ID_Calendar;
      }

      }




 ?>
