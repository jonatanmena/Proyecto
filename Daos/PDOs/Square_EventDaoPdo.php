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
                $query = "INSERT INTO ".$this->tableName." (Price, Remainder, Quantity_available, ID_Square_Kind, ID_Calendar) VALUES (:Price,:Remainder,:Quantity_available,:ID_Square_Kind,:ID_Calendar);";
                $parameters["Price"] = $Square_Event->getPrice();
                $parameters["Remainder"] = $Square_Event->getRemainder();
                $parameters["Quantity_available"] = $Square_Event->getQuantityAvailable();
                $parameters["ID_Square_Kind"] = $Square_Event->getSquareKind()->getID();
                $parameters["ID_Calendar"] = $Square_Event->getCalendar()->getID();

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

                $CalendarData = new CalendarDaoPdo();
                $Square_KindData = new Square_kindDaoPdo();
                $Square_EventList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {

                    $Square_EventObject = new Square_Event( $row["Price"],$row["Remainder"],$row["Quantity_available"],
                                                            $Square_KindData->GetBySquare_kindCode($row["ID_Square_Kind"]),
                                                            $CalendarData->GetByCalendarCode($row["ID_Calendar"]));

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
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Square_Event = :ID_Square_Event";
                $parameters["ID_Square_Event"] = $Square_EventCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $Square_EventObject = new Square_Event( $row["Price"],$row["Remainder"],$row["Quantity_available"],
                                                            $Square_KindData->GetBySquare_kindCode($row["ID_Square_Kind"]),
                                                            $CalendarData->GetByCalendarCode($row["ID_Calendar"]));

                    $Square_EventObject->setID($row["ID_Square_Event"]);
                }
                var_dump($Square_EventObject);
                return $Square_EventObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function allSquareEventByCalendarcode($Square_EventCode)
        {
            try {
                $Square_EventCodeArray= array();

                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Square_Event = :ID_Square_Event";
                $parameters["ID_Square_Event"] = $Square_EventCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row) {
                    array_push($Square_EventCodeArray,$row["ID_Square_Event"]);
                }
                return $Square_EventCodeArray;
            } catch (Exception $ex) {
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
