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
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(ADD_PATH."newClient.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function generateClient($Name, $Surname, $DNI)
        {
          $Client = null;
          $Client = $this->ClientData->getClientByDNI($DNI);

          if ($Client == null) {
              $ClientObject=new Client($Name, $Surname, $DNI);
              $this->ClientData->add($ClientObject);
              echo '
              <script type="text/javascript">
              alert("Cliente asignado con exito.");
              location="'.FRONT_ROOT.'main/purchase";
              </script>
              ';
          } else {
            echo '
              <script type="text/javascript">
              alert("Cliente asignado con exito.");
              location="'.FRONT_ROOT.'main/makeClient";
              </script>
              ';
          }
        }
        public function listClients()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listClients.php");
            require_once(VIEWS_PATH."footerViejo.php");
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
                echo '<script language="javascript">';
                echo 'alert("Ese DNI ya existe")';
                echo '</script>';
                $this->newClient();
            }
        }
    }
