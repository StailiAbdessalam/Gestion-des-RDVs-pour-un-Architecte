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
          $this->valide = $user;
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
    $CreateAcc = $this->model('UserModel');
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $data = array_values((array)$data);
      $data[5]=uniqid();
      $created = $CreateAcc->insert($data);
      if ($created) {
        echo json_encode($data);
      }
    }
  }

  public function getAllRDV()
  {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $RDV = $this->model('RDVModel');
    $RDVs = $RDV->selectAll($_GET['id']);
    echo json_encode($RDVs);
    }
  }

  public function getOne()
  {
    $select = $this->model('UserModel');
    $selected = $select->selectAll();
    echo json_encode($selected);
  }

  public function addAppointment(){
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $addApp = $this->model('RDVModel');
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $data = array_values((array)$data);
      $created = $addApp->insertRDV($data);
      echo json_encode($created);
      // if ($created) {
      //   echo json_encode($data);
      // }
    }
  }
  public function remove(){
    if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
      $deleteRDV = $this->model('RDVModel');
      $deleteRDV->deleteRDV($_GET['id']);
    }
  }
}