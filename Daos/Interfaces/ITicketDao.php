<?php
    namespace DAOS\Interfaces;

    Use Model\Ticket as Ticket;

    interface ITicketDao
    {
      function Add(Ticket $Ticket);
      function Delete($TicketCode);
      function GetByTicketCode($TicketCode);
      function getAll();
    }

 ?>
