<?php
    namespace Model;

    class Event
    {
      private $title;
      private $ID;

      public function __construct($title)
      {
          $this->setTitle($title);
      }

      public function setTitle($title)
      {
          $this->title = $title;

          return $this;
      }

      public function getTitle()
      {
          return $this->title;
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
