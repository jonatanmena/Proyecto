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
            $Category = null;
            $Category = $this->CategoryData->getCategoryByDescription($Description);
            if ($Category == null) {
                $CategoryObject=new Category($Description);
                $this->CategoryData->Add($CategoryObject);
                $this->listCategories();
            } else {
                require("view/newCategory.php");
                echo '<script language="javascript">';
                echo 'alert("Esa categoria ya existe")';
                echo '</script>';
            }
        }
        public function listCategories()
        {
            require_once("View/listCategories.php");
        }
    }
