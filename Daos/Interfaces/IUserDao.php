<?php
    namespace DAOS;

    Use Model\User as User;

    interface IUserDao
    {
      function Add(User $User);
      function Delete($UserCode);
      function GetByUserCode($UserCode);
      function getAll();
    }

 ?>
