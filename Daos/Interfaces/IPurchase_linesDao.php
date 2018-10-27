<?php
    namespace DAOS\Interfaces;

    Use Model\Purchase_Lines as Purchase_Lines;

    interface IPurchase_LinesDao
    {
      function Add(Purchase_Lines $Purchase_Lines);
      function Delete($Purchase_LinesCode);
      function GetByPurchase_LinesCode($Purchase_LinesCode);
      function getAll();
    }

 ?>
