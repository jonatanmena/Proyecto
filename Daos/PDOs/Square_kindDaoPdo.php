<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\ISquare_KindDao as ISquare_kindDao;
    use Model\Square_kind as Square_kind;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class Square_kindDaoPdo implements ISquare_kindDao
    {
        private $connection;
        private $tableName = "Square_kinds";

        public function Add(Square_kind $Square_kind)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Description) VALUES (:Description);";
                $parameters["Description"] = $Square_kind->getDescription();
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
                $Square_kindList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $Square_kindObject = new Square_kind($row["Description"]);
                    $Square_kindObject->setID($row["ID_Square_kind"]);
                    array_push($Square_kindList, $Square_kindObject);
                }
                return $Square_kindList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetBySquare_kindCode($Square_kindCode)
        {
            try
            {
                $Square_kindObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Square_kind = :Square_kindCode";
                $parameters["ID_Square_kind"] = $Square_kindCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $Square_kindObject = new Square_kind($row["Description"]);
                    $Square_kindObject->setID($row["ID_Square_kind"]);
                }

                return $Square_kindObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($Square_kindCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Square_kind = :Square_kindCode";
                $parameters["ID_Square_kind"] = $Square_kindCode;
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
