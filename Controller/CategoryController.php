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
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(ADD_PATH."newCategory.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function listCategories()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listCategories.php");
            require_once(VIEWS_PATH."footerViejo.php");
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
                echo '<script language="javascript">';
                echo 'alert("Esa categoria ya existe")';
                echo '</script>';
                $this->newCategory();

            }
        }
    }
