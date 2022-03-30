<?php
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
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            // data donner une chiffre unique
            // var_dump($users);
            foreach ($admins as $admin) {
                if ($admin['Reference_unique'] == $data->Reference_unique) {
                    $this->valide = true;
                } else {
                    echo "false";
                }
            }
        }
    }

    public function DELETE()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $admin = $this->model('UserModel');
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
