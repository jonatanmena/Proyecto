<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\ICalendarDao as ICalendarDao;
    use Model\Calendar as Calendar;
    use Daos\Connection as Connection;
    use \Exception as Exception;
    use Daos\PDOs\EventDaoPdo as EventDaoPdo;
    use Daos\PDOs\Place_EventDaoPdo as Place_EventDaoPdo;

    class CalendarDaoPdo implements ICalendarDao
    {
        private $connection;
        private $tableName = "Calendars";

        public function Add(Calendar $Calendar)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (CalendarDate, ID_Event, ID_Place_Event) VALUES (:CalendarDate, :ID_Event, :ID_Place_Event);";
                $parameters["CalendarDate"] = $Calendar->getDate();
                $parameters["ID_Event"] = $Calendar->getEvent()->getID();
                $parameters["ID_Place_Event"] = $Calendar->getPlaceEvent()->getID();
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
                $Place_EventData = new Place_EventDaoPdo();
                $EventData = new EventDaoPdo();
                $CalendarList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $calendarObject = new Calendar($row["CalendarDate"], $EventData->GetByEventCode($row["ID_Event"]), $Place_EventData->GetByPlace_eventCode($row["ID_Place_Event"]));
                    $calendarObject->setID($row["ID_Calendar"]);
                    array_push($CalendarList, $calendarObject);
                }
                return $CalendarList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByCalendarCode($CalendarCode)
        {
            try
            {
                $CalendarObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Calendar = :CalendarCode";
                $parameters["ID_Calendar"] = $CalendarCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $calendarObject = new Calendar($row["CalendarDate"]);
                    $calendarObject->setID($row["ID_Calendar"]);
                }

                return $calendarObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($CalendarCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Calendar = :CalendarCode";
                $parameters["ID_Calendar"] = $CalendarCode;
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
