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
            $this->Purchase_LinesData = new Purchase_LinesDaoPdo();
        }
        public function newPurchase_Lines()
        {
            if (empty($this->PurchaseData->getAll())) {
                echo '<script language="javascript">';
                echo 'alert("No hay Compras cargadas ingresa al menos una")';
                echo '</script>';
                require_once(VIEWS_PATH."nav-bar.php");
                require_once(VIEWS_PATH."footerViejo.php");
            }else {
                require_once(VIEWS_PATH."nav-bar.php");
                require_once(ADD_PATH."newPurchase_Lines.php");
                require_once(VIEWS_PATH."footerViejo.php");
            }
        }

        public function listPurchase_Lines()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listPurchase_Lines.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function addPurchase_Lines($Quantity, $Price,$Purchase)
        {
            $Purchase_LinesObject=new Purchase_Lines($Quantity, $Price,$this->PurchaseData->getByPurchaseCode($Purchase));
            $this->Purchase_LinesData->add($Purchase_LinesObject);
            $this->listPurchase_Lines();
        }
    }
