<?php
    namespace DAOS\Interfaces;

    Use Model\Place_Event as Place_Event;

    interface IPlace_EventDao
    {
      function Add(Place_Event $Place_Event);
      function Delete($Place_EventCode);
      function GetByPlace_EventCode($Place_EventCode);
      function getAll();
    }

 ?>
