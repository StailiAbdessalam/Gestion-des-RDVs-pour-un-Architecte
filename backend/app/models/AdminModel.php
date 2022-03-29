<?php
require_once "../libraries/Database.php";
require_once "../config/Function.php";
class Admin
{
    protected $db;
    public function __construct()
    {
        $con = new Database();
        $this->db = $con->dbh;
    }
    public function select()
    {
        $conn = $this->db;
        $requi = "SELECT * FROM `admin` WHERE id";
        $stm = $conn->prepare($requi);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
