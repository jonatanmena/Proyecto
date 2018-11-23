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
            $Artist = NULL;
            $Artist = $this->ArtistData->getArtistByName($Name);
              if($Artist == NULL)
              {
                $Portrait = $this->moveImage($Name);
                $ArtistObject=new Artist($Name, $Description, $Gender, $Portrait);
                $this->ArtistData->add($ArtistObject);
                $this->listArtists();
              }else {
                require("view/newArtist.php");
                echo '<script language="javascript">';
                echo 'alert("'.$Name.' ya existe en la base de datos")';
                echo '</script>';
              }
        }
        public function listArtists()
        {
            require_once("View/listArtists.php");
        }
        public function deleteArtist($ArtistCode){
            $deleted = false;
            $deleted = $this->ArtistData->logicalDelete($ArtistCode);
              if($deleted == true){
                $this->listArtists();
                echo '<script language="javascript">';
                echo 'alert("'.$this->ArtistData->GetByArtistCode($ArtistCode)->getName().' desactivado correctamente.")';
                echo '</script>';
              }else {
                $this->listArtists();
                echo '<script language="javascript">';
                echo 'alert("No se puede desactivar '.$this->ArtistData->GetByArtistCode($ArtistCode)->getName().' tiene eventos futuros.")';
                echo '</script>';
              }
        }
        public function activateArtist($ArtistCode){
          $this->ArtistData->activateArtist($ArtistCode);
          echo '<script language="javascript">';
          echo 'alert("'.$this->ArtistData->GetByArtistCode($ArtistCode)->getName().' activado correctamente")';
          echo '</script>';
          $this->listArtists();
        }
        public function moveImage($name){
            $imageDirectory = VIEWS_PATH.'img/artists/';

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
