<?php
    namespace Model;

    class Artist
    {
      private $Name;
      private $Description;
      private $Gender;
      private $Portrait;
      private $ID;


      public function __construct($Name, $Description, $Gender, $Portrait)
      {
          $this->setName($Name);
          $this->setDescription($Description);
          $this->setGender($Gender);
          $this->setPortrait($Portrait);
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
}
