<?php
    namespace DAOS;

    Use Model\Purchase as Purchase;

    interface IPurchaseDao
    {
      function Add(Purchase $Purchase);
      function Delete($PurchaseCode);
      function GetByPurchaseCode($PurchaseCode);
      function getAll();
    }

 ?>
