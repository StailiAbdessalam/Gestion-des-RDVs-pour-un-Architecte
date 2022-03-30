<?php
require_once APPROOT.'/config/config.php';
require_once APPROOT."../config/Function.php";
class RDVModel
{
    protected $db;
    public function __construct()
    {
        $con = new Database();
        $this->db = $con->dbh;
    }
}
