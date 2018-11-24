<?php
    namespace Model;

    class Artist
    {
      private $Name;
      private $Description;
      private $Gender;
      private $Portrait;
      private $ID;
      private $Status;


      public function __construct($Name, $Description, $Gender, $Status = NULL , $Portrait = "Sin Imagen")
      {
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Gender = $Gender;
        $this->Portrait = $Portrait;
        if(NULL === $Status){
          $Status = "Activo";
        }
        $this->Status = $Status;
      }

      public function setName($Name)
      {
          $this->Name = $Name;

          return $this;
      }
      public function getName()
      {
          return $this->Name;
      }
      public function setDescription($Description)
      {
          $this->Description = $Description;

          return $this;
      }
      public function getDescription()
      {
          return $this->Description;
      }
      public function setGender($Gender)
      {
          $this->Gender = $Gender;

          return $this;
      }
      public function getGender()
      {
          return $this->Gender;
      }
      public function setPortrait($Portrait)
      {
          $this->Portrait = $Portrait;

          return $this;
      }
      public function getPortrait()
      {
          return $this->Portrait;
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

      public function getStatus()
      {
          return $this->Status;
      }

      public function setStatus($Status)
      {
          $this->Status = $Status;

          return $this;
      }

}
