<?php
require_once APPROOT . '/config/config.php';
require_once APPROOT . "../config/Function.php";
class AdminModel
{
    protected $db;
    public function __construct()
    {
        $con = new Database();
        $this->db = $con->dbh;
    }
    public function selectAll()
    {
        $conn = $this->db;
        $requi = "SELECT * FROM `admin`";
        $stm = $conn->prepare($requi);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
