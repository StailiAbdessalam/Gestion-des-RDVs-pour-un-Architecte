<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
class User extends Controller
{
  public $valide = "false";
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
      foreach ($users as $user) {
        if ($user['Reference_unique'] == $data) {
          $this->valide = true;
          break;
        } else {
          $this->valide = false;
        }
      }
    }
    echo json_encode($this->valide);
    // echo "hslfhids";
  }

  public function register()
  {
    echo "register hi ";
  }

  public function getAllRDV(){
    $user = $this->model('RDVModel');
    $users = $user->selectAll($_GET['id']);
    echo json_encode($users);
     
  }
}
