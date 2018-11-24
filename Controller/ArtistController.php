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
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(ADD_PATH."newArtist.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function modifyArtist(){

            require_once(VIEWS_PATH."nav-bar.php");
            require_once(UPDATE_PATH."updateArtist.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function listArtists()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listArtists.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function addArtist($Name, $Description, $Gender)
        {
            $Artist = NULL;
            $Artist = $this->ArtistData->getArtistByName($Name);
              if($Artist == NULL)
              {
                $Portrait = $this->moveImage($Name);
                $ArtistObject=new Artist($Name, $Description, $Gender, $Status = NULL,$Portrait);
                $this->ArtistData->add($ArtistObject);
                $this->listArtists();
              }else {
                echo '<script language="javascript">';
                echo 'alert("'.$Name.' ya existe en la base de datos")';
                echo '</script>';
                $this->newArtist();
              }
        }
        public function deleteArtist($ArtistCode){
            $deleted = false;
            $deleted = $this->ArtistData->logicalDelete($ArtistCode);
              if($deleted == true){
                echo '<script language="javascript">';
                echo 'alert("'.$this->ArtistData->GetByArtistCode($ArtistCode)->getName().' desactivado correctamente.")';
                echo '</script>';
                $this->listArtists();
              }else {
                echo '<script language="javascript">';
                echo 'alert("No se puede desactivar '.$this->ArtistData->GetByArtistCode($ArtistCode)->getName().' tiene eventos futuros.")';
                echo '</script>';
                $this->listArtists();
              }
        }
        public function activateArtist($ArtistCode){
          $this->ArtistData->activateArtist($ArtistCode);
          echo '<script language="javascript">';
          echo 'alert("'.$this->ArtistData->GetByArtistCode($ArtistCode)->getName().' activado correctamente")';
          echo '</script>';
          $this->listArtists();
        }
        public function updateArtist($Name,$Description,$Gender,$ArtistCode,$Status = NULL,$Portrait="Sin Imagen"){
          if(NULL === $Status){
            $Status = "Inactivo";
          }
          $oldName=$this->ArtistData->GetByArtistCode($ArtistCode)->getName();
          $Portrait = $this->moveImage($Name);
          $Artist = new Artist($Name, $Description, $Gender,$Status,$Portrait);
          $updated= $this->ArtistData->updateArtist($ArtistCode,$Artist);
          if($updated == true){
            echo '<script language="javascript">';
            echo 'alert("'.$oldName.' modificado correctamente.")';
            echo '</script>';
            $this->listArtists();
          }else {
            echo '<script language="javascript">';
            echo 'alert("No se puede modificar '.$this->ArtistData->GetByArtistCode($ArtistCode)->getName().' tiene eventos futuros.")';
            echo '</script>';
            $this->listArtists();
          }

        }
        public function moveImage($name){
            $imageDirectory = VIEWS_PATH.'img/artists/';

            if(!file_exists($imageDirectory)){

                mkdir($imageDirectory);
            }

            if($_FILES and $_FILES['image']['size']>0){
              echo "primer if";

                if((isset($_FILES['image'])) && ($_FILES['image']['name'] != '')){
                  echo "segundo if";

                    $file = $imageDirectory . $name . "." . $this->obtenerExtensionFichero($_FILES['image']['name']);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $file);
                    /*
                    if(!file_exists($file)){
                      echo "tercer if";
                        move_uploaded_file($_FILES["image"]["tmp_name"], $file);
                    }
                    */
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
