<?php
    namespace DAOS;

    Use Model\Purchase_lines as Purchase_lines;

    interface IPurchase_linesDao
    {
      function Add(Purchase_lines $Purchase_lines);
      function Delete($Purchase_linesCode);
      function GetByPurchase_linesCode($Purchase_linesCode);
      function getAll();
    }

 ?>
