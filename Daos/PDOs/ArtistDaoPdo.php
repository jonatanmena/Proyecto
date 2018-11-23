<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\IArtistDao as IArtistDao;
    use Model\Artist as Artist;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class ArtistDaoPdo implements IArtistDao
    {
        private $connection;
        private $tableName = "Artists";

        public function Add(Artist $Artist)
        {
            try {
                $query = "INSERT INTO ".$this->tableName." (Name,Description,Gender,Status,Portrait) VALUES (:Name,:Description,:Gender,:Status,:Portrait);";
                $parameters["Name"] = $Artist->getName();
                $parameters["Description"] = $Artist->getDescription();
                $parameters["Gender"] = $Artist->getGender();
                if ($Artist->getStatus()!=null) {
                    $parameters["Status"] = $Artist->getStatus();
                } else {
                    $parameters["Status"] = "Inactivo";
                }
                if ($Artist->getPortrait()!=null) {
                    $parameters["Portrait"] = $Artist->getPortrait();
                } else {
                    $parameters["Portrait"] = "Sin Imagen";
                }

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function getArtistByName($Name)
        {
            try {
                $ArtistObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE Name = :Name";
                $parameters["Name"] = $Name;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row) {
                    $ArtistObject = new Artist($row["Name"], $row["Description"], $row["Gender"], $row["Status"], $row["Portrait"]);
                    $ArtistObject->setID($row["ID_Artist"]);
                }


                return $ArtistObject;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function GetAll()
        {
            try {
                $ArtistList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row) {
                    $ArtistObject = new Artist($row["Name"], $row["Description"], $row["Gender"], $row["Status"], $row["Portrait"]);
                    $ArtistObject->setID($row["ID_Artist"]);
                    array_push($ArtistList, $ArtistObject);
                }
                return $ArtistList;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function GetByArtistCode($ArtistCode)
        {
            try {
                $ArtistObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Artist = :ID_Artist";
                $parameters["ID_Artist"] = $ArtistCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row) {
                    $ArtistObject = new Artist($row["Name"], $row["Description"], $row["Gender"], $row["Status"], $row["Portrait"]);
                    $ArtistObject->setID($row["ID_Artist"]);
                }

                return $ArtistObject;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function activateArtist($ArtistCode)
        {
          try {
                $query = "UPDATE ".$this->tableName." SET Status = 'Activo' WHERE ID_Artist = :ID_Artist";
                $parameters["ID_Artist"] = $ArtistCode;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
              }
           catch (Exception $ex) {
              throw $ex;
          }
        }
        public function logicalDelete($ArtistCode)
        {
            try {
                $CalendarXArtistObject = new CalendarXArtistDaoPdo();
                $deleted=false;
                if($CalendarXArtistObject->isSafeToDelete($ArtistCode)==true){
                  $query = "UPDATE ".$this->tableName." SET Status = 'Inactivo' WHERE ID_Artist = :ID_Artist";
                  $parameters["ID_Artist"] = $ArtistCode;
                  $this->connection = Connection::GetInstance();
                  $this->connection->ExecuteNonQuery($query, $parameters);
                  $deleted=true;

                }
                return $deleted;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function Delete($ArtistCode)
        {
            try {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Artist = :ArtistCode";
                $parameters["ID_Artist"] = $ArtistCode;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } catch (Exception $ex) {
                throw $ex;
            }
        }
    }
