<?php
    namespace Controller;

    use Model\Artist as Artist;
    use Daos\ListArtistDao as ArtistList;

    class ArtistController
    {
        private $ArtistData;

        public function __construct()
        {
            $this->ArtistData=ArtistList::getInstance();
        }
        public function newArtist()
        {
            require_once("View/newArtist.php");
        }
        public function addArtist($Name, $Description, $Gender, $Portrait)
        {
            $ArtistObject=new Artist($Name, $Description, $Gender, $Portrait);
            $this->ArtistData->add($ArtistObject);
            $this->listArtists();
        }
        public function listArtists()
        {
            foreach ($this->ArtistData->listArtists() as $Artist) {
                echo "<br>";
                echo "Nombre:".$Artist->getName()."<br>";
                echo "Descripcion:".$Artist->getDescription()."<br>";
                echo "Genero:".$Artist->getGender()."<br>";
                echo "Portada:".$Artist->getPortrait()."<br>";
            }
        }
    }
