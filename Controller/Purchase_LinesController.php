<?php
    namespace Controller;

    use Model\Purchase_Lines as Purchase_Lines;
    use Daos\PDOs\Purchase_LinesDaoPdo As Purchase_LinesDaoPdo;

    class Purchase_LinesController
    {
      private $Purchase_LinesData;

      function __construct()
      {
        $this->Purchase_LinesData = new Purchase_LinesDaoPdo();
      }
      public function newPurchase_Lines()
      {
          require_once("View/newPurchase_Lines.php");
      }
      public function addPurchase_Lines($Quantity,$Price)
      {
          $Purchase_LinesObject=new Purchase_Lines($Quantity,$Price);
          $this->Purchase_LinesData->add($Purchase_LinesObject);
          $this->listPurchase_Lines();
      }
      public function listPurchase_Lines()
      {

        require_once("View/listPurchase_Lines.php");
/*
          foreach ($this->Purchase_LinesData->GetAll() as $Purchase_Lines) {
              echo "<br>";
              echo "Cantidad:".$Purchase_Lines->getQuantity()."<br>";
              echo "Precio:".$Purchase_Lines->getPrice()."<br>";
              echo "ID:".$Purchase_Lines->getID()."<br>";
          }
          echo '<a href="../Purchase_Lines/newPurchase_Lines"> Boton </a>';

*/
      }
    }

 ?>
