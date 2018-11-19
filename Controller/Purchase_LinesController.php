<?php
    namespace Controller;

    use Model\Purchase_Lines as Purchase_Lines;
    use Daos\PDOs\PurchaseDaoPdo as PurchaseDaoPdo;
    use Daos\PDOs\Purchase_LinesDaoPdo as Purchase_LinesDaoPdo;

    class Purchase_LinesController
    {
        private $Purchase_LinesData;
        private $PurchaseData;

        public function __construct()
        {
            $this->PurchaseData = new PurchaseDaoPdo();
            $this->PurchaseData->getAll();
            $this->Purchase_LinesData = new Purchase_LinesDaoPdo();
        }
        public function newPurchase_Lines()
        {
            if (empty($this->PurchaseData->getAll())) {
                require_once("View/newPurchase.php");
            }
            require_once("View/newPurchase_Lines.php");
        }
        public function addPurchase_Lines($Quantity, $Price,$Purchase)
        {
            $Purchase_LinesObject=new Purchase_Lines($Quantity, $Price,$this->PurchaseData->getByPurchaseCode($Purchase));
            $this->Purchase_LinesData->add($Purchase_LinesObject);
            $this->listPurchase_Lines();
        }
        public function listPurchase_Lines()
        {
            require_once("View/listPurchase_Lines.php");
        }
    }
