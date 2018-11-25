<?php
    namespace Controller;

    use Model\Purchase as Purchase;

    use Daos\PDOs\PurchaseDaoPdo as PurchaseDaoPdo;
    use Daos\PDOs\ClientDaoPdo as ClientDaoPdo;


    class PurchaseController
    {
        private $PurchaseData;
        private $ClientData;

        public function __construct()
        {
            $this->ClientData = new ClientDaoPdo();
            $this->PurchaseData = new PurchaseDaoPdo();
        }
        public function newPurchase()
        {
            if (empty($this->ClientData->getAll())) {
                echo '<script language="javascript">';
                echo 'alert("No hay Clientes cargados ingresa al menos uno")';
                echo '</script>';
                require_once(VIEWS_PATH."nav-bar.php");
                require_once(ADD_PATH."newClient.php");
                require_once(VIEWS_PATH."footerViejo.php");
            }else {
                require_once(VIEWS_PATH."nav-bar.php");
                require_once(ADD_PATH."newPurchase.php");
                require_once(VIEWS_PATH."footerViejo.php");
            }
        }

        public function listPurchases()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listPurchases.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function addPurchase($Date,$Client)
        {
            $PurchaseObject=new Purchase($Date,$this->ClientData->GetByClientCode($Client));
            $this->PurchaseData->add($PurchaseObject);
            $this->listPurchases();
        }
    }
