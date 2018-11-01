<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\IClientDao as IClientDao;
    use Model\Client as Client;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class ClientDaoPdo implements IClientDao
    {
        private $connection;
        private $tableName = "Clients";

        public function Add(Client $Client)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name,Surname,DNI) VALUES (:Name,:Surname,:DNI);";
                $parameters["Name"] = $Client->getName();
                $parameters["Surname"] = $Client->getSurname();
                $parameters["DNI"] = $Client->getDNI();
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
                $ClientList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $ClientObject = new Client($row["Name"],$row["Surname"],$row["DNI"]);
                    $ClientObject->setID($row["ID_Client"]);
                    array_push($ClientList, $ClientObject);
                }
                return $ClientList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByClientCode($ClientCode)
        {
            try
            {
                $ClientObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Client = :ClientCode";
                $parameters["ID_Client"] = $ClientCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $ClientObject = new Client($row["Name"],$row["Surname"],$row["DNI"]);
                    $ClientObject->setID($row["ID_Client"]);

                  }
                return $ClientObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($ClientCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Client = :ClientCode";
                $parameters["ID_Client"] = $ClientCode;
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
