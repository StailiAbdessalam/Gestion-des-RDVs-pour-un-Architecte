<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');

class Admin extends Controller
{
    public $valide = false;
    public function __construct()
    {
    }

    public function index()
    {
        $admin = $this->model('AdminModel');
        // users si la liste des user in database
        $admins = $admin->selectAll();
        // var_dump($admins);
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            foreach ($admins as $admin) {
                if ($admin['Reference_unique'] == $data) {
                    $this->valide = true;
                    break;
                } else {
                    $this->valide = false;
                }
            }
            echo json_encode($this->valide);
        }
    }

    public function DELETEUSER()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $admin = $this->model('UserModel');
            $admin->remove($_GET['id']);
        }
    }
    public function DELETERDV()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $admin = $this->model('RDVModel');
            $admin->remove($_GET['id']);
        }
    }

    public function UserAll()
    {
        $admin = $this->model('UserModel');
        $admins = $admin->selectAll();
        echo json_encode($admins);
    }

    public function RDVALL()
    {
        $admin = $this->model('RDVModel');
        $admins = $admin->selectAll();
        echo json_encode($admins);
    }
}
