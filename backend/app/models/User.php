<?php
require_once "../libraries/Database.php";
class User
{
    protected $db;
    public function __construct()
    {
        $con = new Database();
        $this->db = $con->dbh;
    }

    public function SelectAll()
    {
        $conn = $this->db;
        $requi = "SELECT * FROM `utilisateur` WHERE id";
        $stm = $conn->prepare($requi);
        return  $stm->execute();
    }

    public function select($data,$id)
    {
        $conn = $this->db;
        $requi = "SELECT ".$data." FROM `utilisateur` WHERE id=".$id;
        $stm = $conn->prepare($requi);
        return  $stm->execute();
    }
    public function remove($id){
        $conn = $this->db;
        $requi = "DELETE FROM `utilisateur` WHERE id=".$id;
        $stm = $conn->prepare($requi);
        $stm->execute();
    }
    public function insert(){
        $conn = $this->db;
        $requi = "INSERT INTO `utilisateur` (`Nom`, `Prenom`, `Age`, `CIN`, `Reference unique`) VALUES ()";
        $stm = $conn->prepare($requi);
        $stm->execute();
    }
    
}
