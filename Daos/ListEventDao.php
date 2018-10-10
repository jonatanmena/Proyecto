<?php
    namespace Daos;

    class ListEventDao extends SingletonDao implements IDao
    {
      private $EventList;

      public function __construct()
      {
          if (isset($_SESSION['Event List'])) {
              $this->EventList = $_SESSION['Event List'];
          } else {
              $_SESSION['Event List'] = array();
          }
      }
      public function add($Event)
      {
          $this->EventList = $_SESSION['Event List'];
          array_push($this->EventList, $Event);
          $_SESSION['Event List'] = $this->EventList;
      }
      public function listEvents()
      {
          $this->EventList = $_SESSION['Event List'];
          return $this->EventList;
      }
      public function delete($Event)
      {

      }
      public function search($id)
      {

      }
      public function update($Event)
      {

      }
    }
?>
