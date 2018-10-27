<?php
    namespace DAOS\Interfaces;

    Use Model\Category as Category;

    interface ICategoryDao
    {
      function Add(Category $Category);
      function Delete($CategoryCode);
      function GetByCategoryCode($CategoryCode);
      function getAll();
    }

 ?>
