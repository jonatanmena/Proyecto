<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\ISquare_EventDao as ISquare_EventDao;
    use Model\Square_Event as Square_Event;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class Square_EventDaoPdo implements ISquare_EventDao
    {
        private $connection;
        private $tableName = "Square_Events";

        public function Add(Square_Event $Square_Event)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Price, Remainder, Quantity_available) VALUES (:Price,:Remainder,:Quantity_available);";
                $parameters["Price"] = $Square_Event->getPrice();
                $parameters["Remainder"] = $Square_Event->getRemainder();
                $parameters["Quantity_available"] = $Square_Event->getQuantityAvailable();
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
                $Square_EventList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $Square_EventObject = new Square_Event($row["Price"],$row["Remainder"],$row["Quantity_available"]);
                    $Square_EventObject->setID($row["ID_Square_Event"]);
                    array_push($Square_EventList, $Square_EventObject);
                }
                return $Square_EventList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetBySquare_EventCode($Square_EventCode)
        {
            try
            {
                $Square_EventObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Square_Event = :Square_EventCode";
                $parameters["ID_Square_Event"] = $Square_EventCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $Square_EventObject = new Square_Event($row["Price"],$row["Remainder"],$row["Quantity_available"]);
                    $Square_EventObject->setID($row["ID_Square_Event"]);
                }

                return $Square_EventObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($Square_EventCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Square_Event = :Square_EventCode";
                $parameters["ID_Square_Event"] = $Square_EventCode;
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
