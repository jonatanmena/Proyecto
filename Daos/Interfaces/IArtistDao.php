<?php
    namespace DAOS;

    Use Model\Artist as Artist;

    interface IArtistDao
    {
      function Add(Artist $Artist);
      function Delete($ArtistCode);
      function GetByArtistCode($ArtistCode);
      function getAll();
    }
    
 ?>
