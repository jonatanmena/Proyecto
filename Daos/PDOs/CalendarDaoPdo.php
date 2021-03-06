<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\ICalendarDao as ICalendarDao;
    use Model\Calendar as Calendar;
    use Daos\Connection as Connection;
    use \Exception as Exception;
    use Daos\PDOs\EventDaoPdo as EventDaoPdo;
    use Daos\PDOs\ArtistDaoPdo as ArtistDaoPdo;
    use Daos\PDOs\Place_EventDaoPdo as Place_EventDaoPdo;
    use Daos\PDOs\CalendarXArtistDaoPdo as CalendarXArtistDaoPdo;
    use Daos\PDOs\Square_EventDaoPdo as Square_EventDaoPdo;

    class CalendarDaoPdo implements ICalendarDao
    {
        private $connection;
        private $tableName = "calendars";


        public function Add(Calendar $Calendar)
        {
            try {
                $query = "INSERT INTO ".$this->tableName." (CalendarDate, ID_Event, ID_Place_Event) VALUES (:CalendarDate, :ID_Event, :ID_Place_Event);";
                $parameters["CalendarDate"] = $Calendar->getDate();
                $parameters["ID_Event"] = $Calendar->getEvent()->getID();
                $parameters["ID_Place_Event"] = $Calendar->getPlaceEvent()->getID();
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function GetAll()
        {
            try {
                $Square_EventData = new Square_EventDaoPdo();
                $Place_EventData = new Place_EventDaoPdo();
                $EventData = new EventDaoPdo();
                $CalendarXArtistData = new CalendarXArtistDaoPdo();
                $ArtistData = new ArtistDaoPdo();

                $CalendarList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row) {
                    $calendarObject = new Calendar( $row["CalendarDate"],
                                                    $EventData->GetByEventCode($row["ID_Event"]),
                                                    $Place_EventData->GetByPlace_eventCode($row["ID_Place_Event"]));
                    $calendarObject->setID($row["ID_Calendar"]);

                    $ArtistCodeArray=$CalendarXArtistData->allArtistByCalendarCode($calendarObject->getID());
                    $Square_EventCodeArray=$Square_EventData->allSquareEventByCalendarcode($calendarObject->getID());

                    foreach ($ArtistCodeArray as $ArtistCode) {
                        $calendarObject->setArtist($ArtistData->GetByArtistCode($ArtistCode));
                    }
                    foreach ($Square_EventCodeArray as $Square_EventCode) {
                        $calendarObject->setSquareEvent($Square_EventData->GetBySquare_EventCode($Square_EventCode));
                    }

                    array_push($CalendarList, $calendarObject);
                }
                return $CalendarList;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function ValidateCalendar($Date, $EventCode, $PlaceEventCode)
        {
            try {
                $Place_EventData = new Place_EventDaoPdo();
                $EventData = new EventDaoPdo();
                $CalendarXArtistData = new CalendarXArtistDaoPdo();
                $ArtistData = new ArtistDaoPdo();
                $Square_EventData = new Square_EventDaoPdo();

                $calendarObject = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE CalendarDate = :CalendarDate AND ID_Event = :ID_Event AND ID_Place_Event = :ID_Place_Event";

                $parameters["CalendarDate"] = $Date;
                $parameters["ID_Event"] = $EventCode;
                $parameters["ID_Place_Event"] = $PlaceEventCode;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);

                foreach ($resultSet as $row) {
                    $calendarObject = new Calendar( $row["CalendarDate"],
                                                    $EventData->GetByEventCode($row["ID_Event"]),
                                                    $Place_EventData->GetByPlace_eventCode($row["ID_Place_Event"]));

                    $calendarObject->setID($row["ID_Calendar"]);

                    $ArtistCodeArray=$CalendarXArtistData->allArtistByCalendarCode($calendarObject->getID());
                    $Square_EventCodeArray=$Square_EventData->allSquareEventByCalendarcode($calendarObject->getID());

                    foreach ($ArtistCodeArray as $ArtistCode) {
                        $calendarObject->setArtist($ArtistData->GetByArtistCode($ArtistCode));
                    }
                    foreach ($Square_EventCodeArray as $Square_EventCode) {
                        $calendarObject->setSquareEvent($Square_EventData->GetBySquare_EventCode($Square_EventCode));
                    }
                }

                return $calendarObject;
             } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function GetByCalendarCode($CalendarCode)
        {
            try {
                $Place_EventData = new Place_EventDaoPdo();
                $EventData = new EventDaoPdo();
                $CalendarXArtistData = new CalendarXArtistDaoPdo();
                $ArtistData = new ArtistDaoPdo();
                $Square_EventData = new Square_EventDaoPdo();

                $calendarObject = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Calendar = :ID_Calendar";
                $parameters["ID_Calendar"] = $CalendarCode;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                //var_dump($resultSet);
                foreach ($resultSet as $row) {
                    $calendarObject = new Calendar( $row["CalendarDate"],
                                                    $EventData->GetByEventCode($row["ID_Event"]),
                                                    $Place_EventData->GetByPlace_eventCode($row["ID_Place_Event"]));

                    $calendarObject->setID($row["ID_Calendar"]);

                    $ArtistCodeArray=$CalendarXArtistData->allArtistByCalendarCode($calendarObject->getID());


                    $Square_EventCodeArray=$Square_EventData->allSquareEventByCalendarcode($calendarObject->getID());

                    //var_dump($calendarObject->setSquareEvent($Square_EventData->GetBySquare_EventCode(20)));


                    foreach ($ArtistCodeArray as $ArtistCode) {
                        $calendarObject->setArtist($ArtistData->GetByArtistCode($ArtistCode));
                    }
                    //exit();
                    foreach ($Square_EventCodeArray as $Square_EventCode) {
                      /*
                        var_dump($Square_EventCodeArray);
                        var_dump($Square_EventCode);
                        var_dump($Square_EventData->GetBySquare_EventCode($Square_EventCode));
                        exit();
                      */


                        $calendarObject->setSquareEvent($Square_EventData->GetBySquare_EventCode($Square_EventCode));
                    }
                }
                return $calendarObject;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function GetByCalendarCodeDos($CalendarCode)
        {
            try{
                $calendarObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Calendar = :ID_Calendar";
                $parameters["ID_Calendar"] = $CalendarCode;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                  foreach ($resultSet as $row){
                    //var_dump($resultSet);
                      $calendarObject = new Calendar( $row["CalendarDate"],$row["ID_Event"],$row["ID_Place_Event"]);
                      $calendarObject->setID($row["ID_Calendar"]);
                  }
                  return $calendarObject;
              }catch (Exception $ex) {
                throw $ex;
            }
        }
        public function GetByEventCode($EventCode)
        {
            try {
                $Square_EventData = new Square_EventDaoPdo();
                $Place_EventData = new Place_EventDaoPdo();
                $EventData = new EventDaoPdo();
                $CalendarXArtistData = new CalendarXArtistDaoPdo();
                $ArtistData = new ArtistDaoPdo();

                $CalendarList = array();
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Event = :ID_Event";
                $parameters["ID_Event"] = $EventCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row) {
                    $calendarObject = new Calendar( $row["CalendarDate"],
                                                    $EventData->GetByEventCode($row["ID_Event"]),
                                                    $Place_EventData->GetByPlace_eventCode($row["ID_Place_Event"])
                        );
                    $calendarObject->setID($row["ID_Calendar"]);

                    $ArtistCodeArray=$CalendarXArtistData->allArtistByCalendarCode($calendarObject->getID());
                    $Square_EventCodeArray=$Square_EventData->allSquareEventByCalendarcode($calendarObject->getID());
                    foreach ($ArtistCodeArray as $ArtistCode) {
                        $calendarObject->setArtist($ArtistData->GetByArtistCode($ArtistCode));
                    }
                    foreach ($Square_EventCodeArray as $Square_EventCode) {
                        $calendarObject->setSquareEvent($Square_EventData->GetBySquare_EventCode($Square_EventCode));
                    }
                    array_push($CalendarList, $calendarObject);
                }
                return $CalendarList;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function Delete($CalendarCode)
        {
            try {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Calendar = :CalendarCode";
                $parameters["ID_Calendar"] = $CalendarCode;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (Exception $ex) {
                throw $ex;
            }
        }
    }
