<?php
    namespace Daos;

    class ListArtistDao extends SingletonDao implements IDao
    {
      private $ArtistList;

      public function __construct()
      {
          if (isset($_SESSION['Artist List'])) {
              $this->ArtistList = $_SESSION['Artist List'];
          } else {
              $_SESSION['Artist List'] = array();
          }
      }
      public function add($Artist)
      {
          $this->ArtistList = $_SESSION['Artist List'];
          array_push($this->ArtistList, $Artist);
          $_SESSION['Artist List'] = $this->ArtistList;
      }
      public function listArtists()
      {
          $this->ArtistList = $_SESSION['Artist List'];
          return $this->ArtistList;
      }
      public function delete($Artist)
      {

      }
      public function search($id)
      {

      }
      public function update($Artist)
      {

      }
    }
