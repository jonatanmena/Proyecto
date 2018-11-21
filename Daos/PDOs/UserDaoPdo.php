<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\IUserDao as IUserDao;
    use Model\User as User;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class UserDaoPdo implements IUserDao
    {
        private $connection;
        private $tableName = "Users";

        public function Add(User $User)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (User,Password,Privilege) VALUES (:User,:Password,:Privilege);";
                $parameters["User"] = $User->getUser();
                $parameters["Password"] = $User->getPassword();
                $parameters["Privilege"] = $User->getPrivilege();
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
                $UserList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $UserObject = new User( $row["User"],
                                            $row["Password"],
                                            $row["Privilege"]);
                    $UserObject->setID($row["ID_User"]);
                    array_push($UserList, $UserObject);
                }
                return $UserList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByUserCode($UserCode)
        {
            try
            {
                $UserObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_User = :ID_User";
                $parameters["ID_User"] = $UserCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $UserObject = new User( $row["User"],
                                            $row["Password"],
                                            $row["Privilege"]);
                    $UserObject->setID($row["ID_User"]);
                }

                return $UserObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }

        public function getIfLoggedSucces($User, $Password)
        {
            try {
                $userObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE User = :User AND Password = :Password";
                $parameters["User"] = $User;
                $parameters["Password"] = $Password;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row) {
                    $userObject = new user( $row["User"],
                                            $row["Password"],
                                            $row["Privilege"]);
                    $userObject->setID($row["ID_User"]);
                }
                return $userObject;
            } catch (Exception $ex) {
                throw $ex;
            }
        }
        public function Delete($UserCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_User = :ID_User";
                $parameters["ID_User"] = $UserCode;
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
