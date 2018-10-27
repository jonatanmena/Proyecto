<?php
    namespace DAOS\Interfaces;

    Use Model\Purchase as Purchase;

    interface IPurchaseDao
    {
      function Add(Purchase $Purchase);
      function Delete($PurchaseCode);
      function GetByPurchaseCode($PurchaseCode);
      function getAll();
    }

 ?>
