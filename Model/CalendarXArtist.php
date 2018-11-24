<?php
    namespace Model;

    use Model\Artist as Artist;
    use Model\Calendar as Calendar;

    class CalendarXArtist
    {
      private $Artist;
      private $Calendar;
      private $Status;

      public function __construct($Artist,$Calendar,$Status = NULL)
      {
        $this->Artist = $Artist;
        $this->Calendar = $Calendar;
        if(NULL === $Status){
          $Status = "Activo";
        }
        $this->Status = $Status;
      }
      public function setArtist(Artist $Artist)
      {
          $this->Artist = $Artist;

          return $this;
      }

      public function getArtist()
      {
          return $this->Artist;
      }

      public function setCalendar(Calendar $Calendar)
      {
          $this->Calendar = $Calendar;

          return $this;
      }

      public function getCalendar()
      {
          return $this->Calendar;
      }

      public function getStatus()
      {
          return $this->Status;
      }

      public function setStatus($Status)
      {
          $this->Status = $Status;

          return $this;
      }

}

 ?>
