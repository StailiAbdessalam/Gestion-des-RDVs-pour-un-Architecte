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
    public function remove($id)
    {
        $conn = $this->db;
        $requet = "DELETE FROM `utilisateur` WHERE id=" . $id;
        $stmn = $conn->prepare($requet);
        return $stmn->execute();
    }
    public function selectAllRdv()
    {
        $conn = $this->db;
        $requet = "SELECT * FROM `reservation`";
        $stm = $conn->prepare($requet);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function SelectOneUser($id)
    {
        $conn = $this->db;
        $requet = "SELECT * FROM `utilisateur` WHERE id=" . $id;
        $stmt = $conn->prepare($requet);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateUser($data)
    {
        $conn = $this->db;
        $query = $conn->prepare("UPDATE `utilisateur` SET
                                `Nom`=?,
                                `Prenom`=?,
                                `Age`=?,
                                `Job`=?,
                                `CIN`=?
                                WHERE id=?");
        // var_dump($data);
        // $query->bindParam(':id', $id);
        // $query->bindParam(':Nom', $data[4]);
        // $query->bindParam(':Prenom', $data["Prenom"]);
        // $query->bindParam(':Age', $data["Age"]);
        // $query->bindParam(':Job', $data["Job"]);
        // $query->bindParam(':CIN', $data["CIN"]);
        $params = array($data["Nom"],$data["Prenom"],$data["Age"],$data["Job"],$data["CIN"],$data["id"]);
        return $query->execute($params);
    }
}
