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
                $query = "INSERT INTO ".$this->tableName." (Title, ID_Category, image) VALUES (:Title, :ID_Category, :image);";
                $parameters["Title"] = $Event->getTitle();
                $parameters["ID_Category"] = $Event->getCategory()->getID();
                $parameters["image"] = $Event->getImage();
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
                $CategoryData = new CategoryDaoPdo();
                $EventList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $EventObject = new Event($row["Title"],
                    $CategoryData->GetByCategoryCode($row["ID_Category"]));
                    $EventObject->setID($row["ID_Event"]);
                    $EventObject->setImage($row["image"]);
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
                $CategoryData = new CategoryDaoPdo();
                $EventObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Event = :ID_Event";
                $parameters["ID_Event"] = $EventCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $EventObject = new Event( $row["Title"],
                    $CategoryData->GetByCategoryCode($row["ID_Category"]));
                    $EventObject->setID($row["ID_Event"]);
                    $EventObject->setImage($row["image"]);
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
