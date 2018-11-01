<?php
    namespace Controller;

    use Model\Category as Category;
    use Daos\PDOs\CategoryDaoPdo as CategoryDaoPdo;

    class CategoryController
    {
        private $CategoryData;

        public function __construct()
        {
            $this->CategoryData = new CategoryDaoPdo();
        }
        public function newCategory()
        {
            require_once("View/newCategory.php");
        }
        public function addCategory($Description)
        {
            $CategoryObject=new Category($Description);
            $this->CategoryData->add($CategoryObject);
            $this->listCategories();
        }
        public function listCategories()
        {
            foreach ($this->CategoryData->getAll() as $Category)
            {
                echo "<br>";
                echo "Descripción:".$Category->getDescription()."<br>";
                echo "ID:".$Category->getID()."<br>";
            }
        }
    }
