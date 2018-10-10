<?php
    namespace Daos;

    class ListSquare_eventDao extends SingletonDao implements IDao
    {
      private $Square_eventList;

      public function __construct()
      {
          if (isset($_SESSION['Square_event List'])) {
              $this->Square_eventList = $_SESSION['Square_event List'];
          } else {
              $_SESSION['Square_event List'] = array();
          }
      }
      public function add($Square_event)
      {
          $this->Square_eventList = $_SESSION['Square_event List'];
          array_push($this->Square_eventList, $Event);
          $_SESSION['Square_event List'] = $this->Square_eventList;
      }
      public function listSquare_event()
      {
          $this->Square_eventList = $_SESSION['Square_event List'];
          return $this->Square_eventList;
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
