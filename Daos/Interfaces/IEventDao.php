<?php
    namespace DAOS\Interfaces;

    Use Model\Event as Event;

    interface IEventDao
    {
      function Add(Event $Event);
      function Delete($EventCode);
      function GetByEventCode($EventCode);
      function getAll();
    }

 ?>
