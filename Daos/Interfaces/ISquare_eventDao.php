<?php
    namespace DAOS\Interfaces;

    Use Model\Square_Event as Square_Event;

    interface ISquare_EventDao
    {
      function Add(Square_Event $Square_Event);
      function Delete($Square_EventCode);
      function GetBySquare_EventCode($Square_EventCode);
      function getAll();
    }

 ?>
