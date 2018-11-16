<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\IPlace_eventDao as IPlace_eventDao;
    use Model\Place_event as Place_event;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class Place_eventDaoPdo implements IPlace_eventDao
    {
        private $connection;
        private $tableName = "Place_events";

        public function Add(Place_event $Place_event)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Quantity,Description) VALUES (:Quantity,:Description);";
                $parameters["Quantity"] = $Place_event->getQuantity();
                $parameters["Description"] = $Place_event->getDescription();
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
                $Place_eventList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $Place_eventObject = new Place_event($row["Quantity"],$row["Description"]);
                    $Place_eventObject->setID($row["ID_Place_Event"]);
                    array_push($Place_eventList, $Place_eventObject);
                }
                return $Place_eventList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByPlace_eventCode($Place_eventCode)
        {
            try
            {
                $Place_eventObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Place_event = :ID_Place_event";
                $parameters["ID_Place_event"] = $Place_eventCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $Place_eventObject = new Place_event($row["Quantity"],$row["Description"]);
                    $Place_eventObject->setID($row["ID_Place_Event"]);
                }

                return $Place_eventObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($Place_eventCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Place_event = :Place_eventCode";
                $parameters["ID_Place_event"] = $Place_eventCode;
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
