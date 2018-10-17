<?php
    namespace DAOS;

    Use Model\Square_event as Square_event;

    interface ISquare_eventDao
    {
      function Add(Square_event $Square_event);
      function Delete($Square_eventCode);
      function GetBySquare_eventCode($Square_eventCode);
      function getAll();
    }

 ?>
