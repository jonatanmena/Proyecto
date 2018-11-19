<?php
    namespace Controller;

    use Model\Event as Event;
    use Daos\PDOs\EventDaoPdo as EventDaoPdo;
    use Daos\PDOs\CategoryDaoPdo as CategoryDaoPdo;

    class EventController
    {
        private $EventData;
        private $CategoryData;

        public function __construct()
        {
            $this->CategoryData = new CategoryDaoPdo();
            $this->CategoryData->getAll();
            $this->EventData = new EventDaoPdo();
        }
        public function newEvent()
        {
            if (empty($this->CategoryData->getAll())) {
                require_once("View/newCategory.php");
            }
            require_once("View/newEvent.php");
        }
        public function addEvent($title, $category)
        {
            $Image = $this->moveImage($title);
            $EventObject=new Event($title, $this->CategoryData->GetByCategoryCode($category), $Image);
            $this->EventData->add($EventObject);
            $this->listEvents();
        }

        public function listEvents()
        {
            require_once("View/listEvents.php");
        }

        public function moveImage($name){
            $imageDirectory = 'Images/Events/';

            if(!file_exists($imageDirectory)){

                mkdir($imageDirectory);
            }
            //print_r($_FILES);
            //exit;

            if($_FILES and $_FILES['image']['size']>0){

                if((isset($_FILES['image'])) && ($_FILES['image']['name'] != '')){

                    $file = $imageDirectory . $name . "." . $this->obtenerExtensionFichero($_FILES['image']['name']);

                    if(!file_exists($file)){

                        move_uploaded_file($_FILES["image"]["tmp_name"], $file);
                    }

                    return $file;
                }
            }else{
                return null;
            }
        }

        function obtenerExtensionFichero($str){
            $temp = explode(".", $str);
            return end($temp);
        }

    }
