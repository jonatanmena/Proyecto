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
            $this->ClientData->getAll();
            $this->PurchaseData = new PurchaseDaoPdo();
        }
        public function newPurchase()
        {
            if (empty($this->ClientData->getAll())) {
                require_once("View/newClient.php");
            }
            require_once("View/newPurchase.php");
        }
        public function addPurchase($Date,$Client)
        {
            $PurchaseObject=new Purchase($Date,$this->ClientData->GetByClientCode($Client));
            $this->PurchaseData->add($PurchaseObject);
            $this->listPurchases();
        }
        public function listPurchases()
        {
            require_once("View/listPurchases.php");
        }
    }
