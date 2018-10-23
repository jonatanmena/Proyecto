<?php
    namespace DAOS\Interfaces;

    Use Model\Square_kind as Square_kind;

    interface ISquare_kindDao
    {
      function Add(Square_kind $Square_kind);
      function Delete($Square_kindCode);
      function GetBySquare_kindCode($Square_kindCode);
      function getAll();
    }

 ?>
