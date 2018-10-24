<?php
    namespace Controller;

    use Model\Client as Client;
    use Daos\PDOs\ClientDaoPdo as ClientDaoPdo;

    class ClientController
    {
        private $ClientData;
        private $TestGit;

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
            foreach ($this->ClientData->getAll() as $Client)
            {
                echo "<br>";
                echo "Nombre:".$Client->getName()."<br>";
                echo "Apellido:".$Client->getSurname()."<br>";
                echo "DNI:".$Client->getDNI()."<br>";
            }
        }
    }
