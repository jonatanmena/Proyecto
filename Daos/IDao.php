<?php namespace Daos;

    interface IDao
    {
      public function add($dato);
      public function delete($dato);
      public function search($id);
      public function update($datonuevo);
    }
