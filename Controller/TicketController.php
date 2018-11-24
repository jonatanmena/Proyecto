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
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(ADD_PATH."newTicket.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function listTickets()
        {            
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listTickets.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function addTicket($Number, $QR)
        {
            $TicketObject=new Ticket($Number, $QR);
            $this->TicketData->add($TicketObject);
            $this->listTickets();
        }
    }
