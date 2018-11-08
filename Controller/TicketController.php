<?php
    namespace Controller;

    use Model\Ticket as Ticket;
    use Daos\PDOs\TicketDaoPdo As TicketDaoPdo;

    class TicketController
    {
      private $TicketData;

      function __construct()
      {
        $this->TicketData = new TicketDaoPdo();
      }
      public function newTicket()
      {
          require_once("View/newTicket.php");
      }
      public function addTicket($Number,$QR)
      {
          $TicketObject=new Ticket($Number,$QR);
          $this->TicketData->add($TicketObject);
          $this->listTickets();
      }
      public function listTickets()
      {
          require_once("View/listTickets.php");

        /*  foreach ($this->TicketData->GetAll() as $Ticket) {
              echo "<br>";
              echo "Number:".$Ticket->getNumber()."<br>";
              echo "QR:".$Ticket->getQR()."<br>";
              echo "ID:".$Ticket->getID()."<br>";
          }
          echo '<a href="../Ticket/newTicket"> Boton </a>';*/
      }
    }

 ?>
