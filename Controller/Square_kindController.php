<?php
    namespace Controller;

    use Model\Square_kind as Square_kind;
    use Daos\PDOs\Square_kindDaoPdo as Square_kindDaoPdo;

    class Square_kindController
    {
        private $Square_kindData;

        public function __construct()
        {
            $this->Square_kindData = new Square_kindDaoPdo();
        }
        public function newSquare_kind()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(ADD_PATH."newSquare_kind.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function listSquare_kinds()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listSquare_kinds.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function addSquare_kind($title)
        {
            $Square_kindObject=new Square_kind($title);
            $this->Square_kindData->add($Square_kindObject);
            $this->listSquare_kinds();
        }
    }
