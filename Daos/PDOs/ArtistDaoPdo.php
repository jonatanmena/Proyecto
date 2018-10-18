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
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Name,Description,Gender,Portrait) VALUES (:Name,:Description,:Gender,:Portrait);";
                $parameters["Name"] = $Artist->getName();
                $parameters["Description"] = $Artist->getDescription();
                $parameters["Gender"] = $Artist->getGender();
                $parameters["Portrait"] = $Artist->getPortrait();
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
                $ArtistList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $ArtistObject = new Artist($row["Name"],$row["Description"],$row["Gender"],$row["Portrait"],$row["ID_Artist"]);
                    array_push($ArtistList, $ArtistObject);
                }
                return $ArtistList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByArtistCode($ArtistCode)
        {
            try
            {
                $ArtistObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Artist = :ArtistCode";
                $parameters["ID_Artist"] = $ArtistCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $ArtistObject = new Artist($row["Name"],$row["Description"],$row["Gender"],$row["Portrait"],$row["ID_Artist"]);
                }

                return $ArtistObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($ArtistCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Artist = :ArtistCode";
                $parameters["ID_Artist"] = $ArtistCode;
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
