<?php
    namespace Controller;

    use Model\Client as Client;
    use Daos\PDOs\ClientDaoPdo as ClientDaoPdo;

    class ClientController
    {
        private $ClientData;

        public function __construct()
        {
            $this->ClientData = new ClientDaoPdo();
        }
        public function newClient()
        {
            require_once("View/newClient.php");
        }
        public function addClient($Name, $Surname, $DNI)
        {
            $ClientObject=new Client($Name, $Surname, $DNI);
            $this->ClientData->add($ClientObject);
            $this->listClients();
        }
        public function listClients()
        {
            require_once("View/listClients.php");
        }
    }
