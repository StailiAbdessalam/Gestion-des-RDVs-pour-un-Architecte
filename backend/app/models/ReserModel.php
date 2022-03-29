<?php

class Rdv
{
    protected $db;
    public function __construct()
    {
        $con = new Database();
        $this->db = $con->dbh;
    }

}
