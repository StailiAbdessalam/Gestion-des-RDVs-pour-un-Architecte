<?php
  /* 
   *  CORE CONTROLLER CLASS
   *  Loads Models & Views
   */
  class Controller {
    public function model($model){
      require_once '../app/models/' . $model . '.php';
      return new $model();
    }


    public function view($url, $data = []){
      if(file_exists('../app/views/'.$url.'.php')){
        require_once '../app/views/'.$url.'.php';
      } else {
        die('View does not exist');
      }
    }
  }