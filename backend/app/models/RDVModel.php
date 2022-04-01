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
    public function selectAll($id)
    {
        $conn = $this->db;
        $requi = "SELECT * FROM `reservation` where id_utilisateur=$id";
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

    public function insertRDV($data){
        $conn = $this->db;
        $requi = "INSERT INTO `reservation`(`id_user`,`sujet`, `date`, `creneau`) VALUES (:id_user,:sujet,:date,:creneau)";
        $stm = $conn->prepare($requi);
        $stm->bindParam(':id_user', $_POST['id_user']);
        $stm->bindParam(':sujet', $_POST['sujet']);
        $stm->bindParam(':date', $_POST['date']);
        $stm->bindParam(':creneau', $_POST['creneau']);
        $stm->execute();
    }
}
