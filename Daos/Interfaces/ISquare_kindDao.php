<?php
    namespace DAOS\Interfaces;

    Use Model\Square_Kind as Square_Kind;

    interface ISquare_KindDao
    {
      function Add(Square_Kind $Square_Kind);
      function Delete($Square_KindCode);
      function GetBySquare_KindCode($Square_KindCode);
      function getAll();
    }

 ?>
