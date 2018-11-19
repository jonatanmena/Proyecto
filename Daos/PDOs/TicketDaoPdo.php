<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\ITicketDao as ITicketDao;
    use Model\Ticket as Ticket;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class TicketDaoPdo implements ITicketDao
    {
        private $connection;
        private $tableName = "Tickets";

        public function Add(Ticket $Ticket)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Number,QR) VALUES (:Number,:QR);";
                $parameters["Number"] = $Ticket->getNumber();
                $parameters["QR"] = $Ticket->getQR();
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
                $TicketList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $TicketObject = new Ticket($row["Number"],$row["QR"]);
                    $TicketObject->setID($row["ID_Ticket"]);
                    array_push($TicketList, $TicketObject);
                }
                return $TicketList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByTicketCode($TicketCode)
        {
            try
            {
                $TicketObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Ticket = :ID_Ticket";
                $parameters["ID_Ticket"] = $TicketCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $TicketObject = new Ticket($row["Number"],$row["QR"]);
                    $TicketObject->setID($row["ID_Ticket"]);
                }

                return $TicketObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($TicketCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Ticket = :ID_Ticket";
                $parameters["ID_Ticket"] = $TicketCode;
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
