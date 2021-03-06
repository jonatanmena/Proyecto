<?php
    namespace Daos\Interfaces;

    Use Model\Calendar as Calendar;

    interface ICalendarDao
    {
      function Add(Calendar $Calendar);
      function Delete($CalendarCode);
      function GetByCalendarCode($CalendarCode);
      function getAll();
    }

 ?>
