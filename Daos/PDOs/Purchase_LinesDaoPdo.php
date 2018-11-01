<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\IPurchase_LinesDao as IPurchase_LinesDao;
    use Model\Purchase_Lines as Purchase_Lines;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class Purchase_LinesDaoPdo implements IPurchase_LinesDao
    {
        private $connection;
        private $tableName = "Purchase_Liness";

        public function Add(Purchase_Lines $Purchase_Lines)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Quantity,Price) VALUES (:Quantity,:Price);";
                $parameters["Quantity"] = $Purchase_Lines->getQuantity();
                $parameters["Price"] = $Purchase_Lines->getPrice();
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
                $Purchase_LinesList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $Purchase_LinesObject = new Purchase_Lines($row["Quantity"],$row["Price"]);
                    $Purchase_LinesObject->setID($row["ID_Purchase_Lines"]);
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
                $Purchase_LinesObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Purchase_Lines = :Purchase_LinesCode";
                $parameters["ID_Purchase_Lines"] = $Purchase_LinesCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $Purchase_LinesObject = new Purchase_Lines($row["Quantity"],$row["Price"]);
                    $Purchase_LinesObject->setID($row["ID_Purchase_Lines"]);
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
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Purchase_Lines = :Purchase_LinesCode";
                $parameters["ID_Purchase_Lines"] = $Purchase_LinesCode;
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
