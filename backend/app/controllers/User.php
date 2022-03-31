<?php
header('content-type: application/json');
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
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
  }

  public function register()
  {
    $user = $this->model('UserModel');
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $data = array_values((array)$data);
      $user->insert($data);
      echo "true";
    }
  }
}
