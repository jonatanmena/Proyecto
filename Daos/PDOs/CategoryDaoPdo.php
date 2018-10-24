<?php
    namespace Daos\PDOs ;

    use Daos\Interfaces\ICategoryDao as ICategoryDao;
    use Model\Category as Category;
    use Daos\Connection as Connection;
    use \Exception as Exception;

    class CategoryDaoPdo implements ICategoryDao
    {
        private $connection;
        private $tableName = "categorias";

        public function Add(Category $Category)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (Description) VALUES (:Description);";
                $parameters["Description"] = $Category->getDescription();
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
                $CategoryList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {
                    $CategoryObject = new Category($row["ID_Category"], $row["Description"]);
                    array_push($CategoryList, $CategoryObject);
                }
                return $CategoryList;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function GetByCategoryCode($CategoryCode)
        {
            try
            {
                $CategoryObject = null;
                $query = "SELECT * FROM ".$this->tableName." WHERE ID_Category = :CategoryCode";
                $parameters["ID_Category"] = $CategoryCode;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach ($resultSet as $row)
                {
                    $CategoryObject = new Category($row["ID_Category"], $row["Description"]);
                }

                return $CategoryObject;
            }
            catch (Exception $ex)
            {
                throw $ex;
            }
        }
        public function Delete($CategoryCode)
        {
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID_Category = :CategoryCode";
                $parameters["ID_Category"] = $CategoryCode;
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
