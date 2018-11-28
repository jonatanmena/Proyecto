<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\IPurchase_LinesDao as IPurchase_LinesDao;
    use Model\Purchase_Lines as Purchase_Lines;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class Purchase_LinesDaoPdo implements IPurchase_LinesDao
    {
        private $connection;
        private $tableName = "Purchase_Lines";

        public function Add(Purchase_Lines $Purchase_Lines)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Quantity,Price,ID_Purchase) VALUES (:Quantity,:Price,:ID_Purchase);";
                $parameters["Quantity"] = $Purchase_Lines->getQuantity();
                $parameters["Price"] = $Purchase_Lines->getPrice();
                $parameters["ID_Purchase"] = $Purchase_Lines->getPurchase()->getID();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);

            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetAll()
        {
            try
            {
                $PurchaseData = new PurchaseDaoPdo();
                $Purchase_LinesList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $Purchase_LinesObject = new Purchase_Lines( $row["Quantity"],
                                                                $row["Price"],
                                                                $PurchaseData->GetByPurchaseCode($row["ID_Purchase"]));
                    $Purchase_LinesObject->setID($row["ID_Purchase_Line"]);
                    array_push($Purchase_LinesList, $Purchase_LinesObject);

                }
                return $Purchase_LinesList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetAllPurchase_LinesByPurchaseCode($PurchaseCode)
        {
          try
          {
              $PurchaseData = new PurchaseDaoPdo();
              $Purchase_LinesList = array();
              $query = "SELECT * FROM ".$this->tableName." WHERE ID_Purchase = :ID_Purchase";
              $parameters["ID_Purchase"] = $PurchaseCode;
              $this->connection = Connection::GetInstance();
              $resultSet = $this->connection->Execute($query, $parameters);
              foreach ($resultSet as $row)
              {
                  $Purchase_LinesObject = new Purchase_Lines( $row["Quantity"],
                                                              $row["Price"],
                                                              $PurchaseData->GetByPurchaseCode($row["ID_Purchase"]));
                  $Purchase_LinesObject->setID($row["ID_Purchase_Line"]);

                  array_push($Purchase_LinesList, $Purchase_LinesObject);
              }

              return $Purchase_LinesList;
          }
          catch (Exception $ex)
          {
              throw $ex;
          }
        }
        public function GetByPurchase_LinesCode($Purchase_LinesCode)
        {
            try
            {
                $PurchaseData = new PurchaseDaoPdo();
                $Purchase_LinesObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Purchase_Line = :ID_Purchase_Line";
                $parameters["ID_Purchase_Line"] = $Purchase_LinesCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $Purchase_LinesObject = new Purchase_Lines( $row["Quantity"],
                                                                $row["Price"],
                                                                $PurchaseData->GetByPurchaseCode($row["ID_Purchase"]));
                    $Purchase_LinesObject->setID($row["ID_Purchase_Line"]);
                }

                return $Purchase_LinesObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($Purchase_LinesCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Purchase_Line = :ID_Purchase_Line";
                $parameters["ID_Purchase_Line"] = $Purchase_LinesCode;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>
