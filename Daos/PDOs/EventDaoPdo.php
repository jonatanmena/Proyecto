<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\IEventDao as IEventDao;
    use Model\Event as Event;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class EventDaoPdo implements IEventDao
    {
        private $connection;
        private $tableName = "Events";

        public function Add(Event $Event)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Title) VALUES (:Title);";
                $parameters["Title"] = $Event->getTitle();
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
                $EventList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $EventObject = new Event($row["Title"],$row["ID_Event"]);
                    array_push($EventList, $EventObject);
                }
                return $EventList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByEventCode($EventCode)
        {
            try
            {
                $EventObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Event = :EventCode";
                $parameters["ID_Event"] = $EventCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $EventObject = new Event($row["Title"],$row["ID_Event"]);
                }

                return $EventObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($EventCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Event = :EventCode";
                $parameters["ID_Event"] = $EventCode;
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
