<?php
    namespace Controller;

    use Model\Square_kind as Square_kind;
    use Daos\PDOs\Square_kindDaoPdo As Square_kindDaoPdo;

    class Square_kindController
    {
      private $Square_kindData;

      function __construct()
      {
        $this->Square_kindData = new Square_kindDaoPdo();
      }
      public function newSquare_kind()
      {
          require_once("View/newSquare_kind.php");
      }
      public function addSquare_kind($title,$ID)
      {
          $Square_kindObject=new Square_kind($title,$ID);
          $this->Square_kindData->add($Square_kindObject);
          $this->listSquare_kinds();
      }
      public function listSquare_kinds()
      {
          foreach ($this->Square_kindData->getAll() as $Square_kind) {
              echo "<br>";
              echo "Descripcion:".$Square_kind->getDescription()."<br>";
              echo "ID::".$Square_kind->getID()."<br>";
          }
      }
    }

 ?>
