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
    public function remove($id){
        $conn = $this->db;
        $requet = "DELETE FROM `utilisateur` WHERE id= $id";
        $stmn = $conn->prepare($requet);
        return $stmn->execute();
    }
}
