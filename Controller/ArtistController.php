<?php
    namespace Controller;

    use Model\Artist as Artist;
    use Daos\PDOs\ArtistDaoPdo as ArtisDaoPdo;

    class ArtistController
    {
        private $ArtistData;

        public function __construct()
        {
            $this->ArtistData = new ArtisDaoPdo();
        }
        public function newArtist()
        {
            require_once("View/newArtist.php");
        }
        public function addArtist($Name, $Description, $Gender)
        {
            $Portrait = $this->moveImage($Name);
            $ArtistObject=new Artist($Name, $Description, $Gender, $Portrait);
            $this->ArtistData->add($ArtistObject);
            $this->listArtists();
        }
        public function listArtists()
        {
            require_once("View/listArtists.php");
        }

        public function moveImage($name){
            $imageDirectory = 'Images/Artists/';

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
