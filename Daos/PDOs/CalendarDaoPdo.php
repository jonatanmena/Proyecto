<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\ICalendarDao as ICalendarDao;
    use Model\Calendar as Calendar;

    //use \Exception as Exception;
    //use Daos\Connection as Connection;

    class CalendarDaoPdo implements ICalendarDao
    {
        private $connection;
        private $tableName = "Calendars";

        public function Add(Calendar $Calendar)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Date) VALUES (:Date);";
                $parameters["Date"] = $Calendar->getDate();
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
                    $calendarObject = new Calendar($row["Date"],$row["ID_Calendar"]);
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
                    $calendarObject = new Calendar($row["Date"],$row["ID_Calendar"]);
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
