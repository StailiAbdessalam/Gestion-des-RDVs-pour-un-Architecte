<?php
class User extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    $user = $this->model('UserModel');
    // users si la liste des user in database
    $users = $user->SelectAll();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $json = file_get_contents('php://input');
      // data donner une chiffre unique
      // var_dump($users);
      $data = json_decode($json);
    }
    var_dump($users);
  }

  public function register()
  {
    echo "register hi ";
  }
}
