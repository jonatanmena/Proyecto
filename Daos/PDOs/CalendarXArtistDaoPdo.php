<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\ICalendarXArtistDao as ICalendarXArtistDao;
    use Model\CalendarXArtist as CalendarXArtist;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class CalendarXArtistDaoPdo implements ICalendarXArtistDao
    {
        private $connection;
        private $tableName = "CalendarXArtist";

        public function Add(CalendarXArtist $CalendarXArtist)
        {
            try {
                $query = "INSERT INTO ".$this->tableName." (ID_Artist,ID_Calendar) VALUES (:ID_Artist,:ID_Calendar);";
                $Artist = new ArtistDaoPdo();
                $parameters["ID_Artist"] = $CalendarXArtist->getArtist()->getID();
                $parameters["ID_Calendar"] = $CalendarXArtist->getCalendar()->getID();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function GetAll()
        {
            try {
                $ArtistData = new ArtistDaoPdo();
                $CalendarData = new CalendarDaoPdo();
                $CalendarXArtistList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row) {
                    $CalendarXArtistObject = new CalendarXArtist( $ArtistData->GetByArtistCode($row["ID_Artist"]),
                                                                  $CalendarData->getByCalendarCode($row["ID_Calendar"]));
                    array_push($CalendarXArtistList, $CalendarXArtistObject);
                }
                return $CalendarXArtistList;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function allArtistByCalendarCode($CalendarCode)
        {
            try {
                $ArtistsCodeArray= array();

                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Calendar = :ID_Calendar";
                $parameters["ID_Calendar"] = $CalendarCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row) {
                    array_push($ArtistsCodeArray,$row["ID_Artist"]);
                }
                return $ArtistsCodeArray;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function GetByCalendarXArtistCode($ArtistCode, $CalendarCode)
        {
            try {
                $CalendarXArtistObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Artist = :ArtistCode AND ID_Calendar = :ID_CalendarCode";
                $parameters["ID_Artist"] = $ArtistCode;
                $parameters["ID_Calendar"] = $CalendarCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row) {
                    $CalendarXArtistObject = new CalendarXArtist($row["ID_Artist"], $row["ID_calendar"]);
                    $CalendarXArtistObject->setIDArtist($row["ID_Artist"])->setIDCalendar($row["ID_Calendar"]);
                }
                return $CalendarXArtistObject;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function Delete($ArtistCode, $CalendarCode)
        {
            try {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Artist = :ArtistCode AND ID_Calendar = :ID_CalendarCode";
                $parameters["ID_Artist"] = $ArtistCode;
                $parameters["ID_Calendar"] = $CalendarCode;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (Exception $ex) {
                throw $ex;
            }
        }
    }
