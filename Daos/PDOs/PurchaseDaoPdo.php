<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\IPurchaseDao as IPurchaseDao;
    use Model\Purchase as Purchase;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class PurchaseDaoPdo implements IPurchaseDao
    {
        private $connection;
        private $tableName = "Purchases";

        public function Add(Purchase $Purchase)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Date) VALUES (:Date);";
                $parameters["Date"] = $Purchase->getDate();
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
                $PurchaseList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $PurchaseObject = new Purchase($row["Date"]);
                    $PurchaseObject->setID($row["ID_Purchase"]);
                    array_push($PurchaseList, $PurchaseObject);
                }
                return $PurchaseList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByPurchaseCode($PurchaseCode)
        {
            try
            {
                $PurchaseObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Purchase = :PurchaseCode";
                $parameters["ID_Purchase"] = $PurchaseCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $PurchaseObject = new Purchase($row["Date"]);
                    $PurchaseObject->setID($row["ID_Purchase"]);
                }

                return $PurchaseObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($PurchaseCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Purchase = :PurchaseCode";
                $parameters["ID_Purchase"] = $PurchaseCode;
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
