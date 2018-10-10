<?php
    namespace Model;

    class Client
    {
      private $ID;

      function __construct($ID)
      {
        $this->setID($ID);
      }

      public function setID($ID)
      {
          $this->ID = $ID;

          return $this;
      }

      public function getID()
      {
          return $this->ID;
      }

}
 ?>
