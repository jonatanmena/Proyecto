<?php
    namespace Controller;

    use Model\Purchase as Purchase;
    use Daos\PDOs\PurchaseDaoPdo As PurchaseDaoPdo;

    class PurchaseController
    {
      private $PurchaseData;

      function __construct()
      {
        $this->PurchaseData = new PurchaseDaoPdo();
      }
      public function newPurchase()
      {
          require_once("View/newPurchase.php");
      }
      public function addPurchase($Date)
      {
          $PurchaseObject=new Purchase($Date);
          $this->PurchaseData->add($PurchaseObject);
          $this->listPurchases();
      }
      public function listPurchases()
      {
        require_once("View/listPurchases.php");

        /*  foreach ($this->PurchaseData->GetAll() as $Purchase) {
              echo "<br>";
              echo "Fecha:".$Purchase->getDate()."<br>";
              echo "ID:".$Purchase->getID()."<br>";
          }
          echo '<a href="../Purchase/newPurchase"> Boton </a>';*/
      }
    }

 ?>
