<?php

use function PHPSTORM_META\type;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');

// require_once('../models/UserModel.php');

class User extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $user = $this->model('UserModel');
    $users = $user->SelectAll();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      //  var_dump($data);
      foreach ($users as $user) {
        if ($user['Reference_unique'] == $data) {
          echo "true";
        } else {
          echo "false";
        }
      }
    }
    // var_dump($users);
  }

  public function register()
  { 
    $CreateAcc = $this->model('UserModel');
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $data = array_values((array)$data);
      // echo ($data[0]);
      // echo ($data->{"Nom"});
      $created = $CreateAcc->insert($data);
      if($created){
        echo json_encode("nice");
      }
    }
  }
}
