<?php
    namespace Model;

    use Model\Category as Category;

    class Event
    {
      private $title;
      private $category;
      private $ID;

      public function __construct($title, $category)
      {
        $this->title = $title;
        $this->category = $category;
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

      public function setCategory(Category $category)
      {
          $this->category = $category;

          return $this;
      }

      public function getCategory()
      {
          return $this->category;
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
