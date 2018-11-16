<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\ICalendarDao as ICalendarDao;
    use Model\Calendar as Calendar;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class CalendarDaoPdo implements ICalendarDao
    {
        private $connection;
        private $tableName = "Calendars";

        public function Add(Calendar $Calendar)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (CalendarDate, ID_Event, ID_Place_Event) VALUES (:Date, :ID_Event, :ID_Place_Event);";
                $parameters["Date"] = $Calendar->getDate();
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
                $CalendarList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $calendarObject = new Calendar($row["Date"]);
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
                    $calendarObject = new Calendar($row["Date"]);
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
