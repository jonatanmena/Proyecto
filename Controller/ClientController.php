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
            $Client = null;
            $Client = $this->ClientData->getClientByDNI($DNI);

            if ($Client == null) {
                $ClientObject=new Client($Name, $Surname, $DNI);
                $this->ClientData->add($ClientObject);
                $this->listClients();
            } else {
                require("view/newClient.php");
                echo '<script language="javascript">';
                echo 'alert("Ese DNI ya existe")';
                echo '</script>';
            }
        }
        public function listClients()
        {
            require_once("View/listClients.php");
        }
    }
