<?php
require_once dirname(__DIR__) . "/libraries/Database.php";
class Users
{
    protected $db;

    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->dbh;
    }

    public function select()
    {
        $conn = $this->db;
        $qeruy = "SELECT * FROM `equipe_youcode`";
        $stm = $conn->prepare($qeruy);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($data)
    {
        $conn = $this->db;
        $query = "INSERT INTO `equipe_youcode`(`Name_joeure`, `Equipe`, `pays`, `chiffre`) VALUES (?,?,?,?)";
        $stm = $conn->prepare($query);
        $stm->execute($data);
    }
    public function remove($id)
    {
        $conn = $this->db;
        $query = "DELETE FROM `equipe_youcode` WHERE id = :id";
        $stm = $conn->prepare($query);
        $stm->execute(["id" => $id]);
    }
}
