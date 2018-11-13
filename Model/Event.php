<?php
    namespace Model;

    use Model\Category as Category;

    class Event
    {
      private $title;
      private $ID;
      private $category;

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

      public function setCategory(Category $category)
      {
          $this->category = $category;

          return $this;
      }

      public function getCategory()
      {
          return $this->category;
      }

}
?>
