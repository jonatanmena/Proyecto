<?php
    namespace DAOS;

    Use Model\Place_event as Place_event;

    interface IPlace_eventDao
    {
      function Add(Place_event $Place_event);
      function Delete($Place_eventCode);
      function GetByPlace_eventCode($Place_eventCode);
      function getAll();
    }

 ?>
