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
    $userModel = $this->model('UserModel');
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $user = $userModel->fetchByRef($data);
      echo json_encode($user);
      // foreach ($users as $user) {
      //   if ($data === $user['Reference_unique']) {
      //     $this->valide = $user;
      //     break;
      //   } else {
      //     $this->valide = false;
      //   }
      // }

    }
    // echo json_encode($this->valide);
  }
  public function register()
  {
    $CreateAcc = $this->model('UserModel');
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $data = array_values((array)$data);
      $data[5] = uniqid();
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
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
      $select = $this->model('UserModel');
      $selected = $select->select($_GET['id']);
      echo json_encode($selected);
    }
  }
  public function addAppointment()
  {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $addApp = $this->model('RDVModel');
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $data = array_values((array)$data);
      $created = $addApp->insertRDV($data);
      echo json_encode($created);
    }
  }
  public function remove()
  {
    if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
      $deleteRDV = $this->model('RDVModel');
      $deleteRDV->deleteRDV($_GET['id']);
    }
  }
  public function updateAppointment()
  {
    if ($_SERVER["REQUEST_METHOD"] === "PUT") {
      $updateRDV = $this->model('RDVModel');
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $data = array_values((array)$data);

      $created = $updateRDV->updateRDV($data, $_GET['id']);
      echo json_encode($created);
    }
  }
  public function selectInDate()
  {
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
      $creneaux = $this->model('RDVModel');
      $creneau = $creneaux->slectcreneau($_GET['date']);
      $date = [];
      $date[0] = "10h à 10:30h";
      $date[1] = "11h à 11:30h";
      $date[2] = "14h à 14:30h";
      $date[3] = "15h à 15:30h";
      $date[4] = "16h à 16:30h";

      foreach ($creneau as $creneaux) {
        if ($creneaux['creneau'] == "10h à 10:30h") {
          unset($date[0]);
        }
        if ($creneaux['creneau'] == "11h à 11:30h") {
          unset($date[1]);
        }
        if ($creneaux['creneau'] == "14h à 14:30h") {
          unset($date[2]);
        }
        if ($creneaux['creneau'] == "15h à 15:30h") {
          unset($date[3]);
        }
        if ($creneaux['creneau'] == "16h à 16:30h") {
          unset($date[4]);
        }
      }
      echo json_encode($date);
    }
  }
}
