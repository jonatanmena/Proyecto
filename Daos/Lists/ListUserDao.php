<?php
    namespace Daos;

    class ListUserDao extends SingletonDao implements IDao
    {
      private $UserList;

      public function __construct()
      {
          if (isset($_SESSION['User List'])) {
              $this->UserList = $_SESSION['User List'];
          } else {
              $_SESSION['User List'] = array();
          }
      }
      public function add($User)
      {
          $this->UserList = $_SESSION['User List'];
          array_push($this->UserList, $User);
          $_SESSION['User List'] = $this->UserList;

      }
      public function listUsers()
      {
          $this->UserList = $_SESSION['User List'];
          return $this->UserList;
      }
      public function delete($User)
      {

      }
      public function search($id)
      {

      }
      public function update($User)
      {

      }
    }
 ?>
