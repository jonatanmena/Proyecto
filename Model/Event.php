<?php
    namespace Model;

    use Model\Category as Category;

    class Event
    {
      private $title;
      private $category;
      private $ID;
      private $image;
      private $Status;

      public function __construct($title, $category, $image = "Sin Imagen", $Status = "Activo")
      {
        $this->title = $title;
        $this->category = $category;
        $this->image = $image;
        $this->Status = $Status;
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

      public function getImage()
      {
        return $this->image;
      }

      public function setImage($image)
      {
        $this->image = $image;
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
?>
