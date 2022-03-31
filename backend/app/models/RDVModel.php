<?php
require_once APPROOT . '/config/config.php';
require_once APPROOT . "../config/Function.php";
class RDVModel
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
        $requi = "SELECT * FROM `reservation`";
        $stm = $conn->prepare($requi);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function remove($id)
    {
        $conn = $this->db;
        $requi = "DELETE FROM `reservation` WHERE id=" . $id;
        $stm = $conn->prepare($requi);
        $stm->execute();
    }
}
