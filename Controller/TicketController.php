<?php
    namespace Controller;

    use Model\Ticket as Ticket;
    use Daos\PDOs\TicketDaoPdo as TicketDaoPdo;

    class TicketController
    {
        private $TicketData;

        public function __construct()
        {
            $this->TicketData = new TicketDaoPdo();
        }
        public function newTicket()
        {
            require_once("View/newTicket.php");
        }
        public function addTicket($Number, $QR)
        {
            $TicketObject=new Ticket($Number, $QR);
            $this->TicketData->add($TicketObject);
            $this->listTickets();
        }
        public function listTickets()
        {
            require_once("View/listTickets.php");
        }
    }
