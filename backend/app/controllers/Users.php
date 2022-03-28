<?php
require_once dirname(__DIR__) . "/models/User.php";
header("content-type: application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $data = array_values((array) $data);
    $inser = new Users();
    $inser->insert($data);
}
if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    $remove = new Users();
    $remove->remove($_GET["id"] ?? null);
}
$newuset = new Users();
$newuser = $newuset->select();

echo json_encode($newuser);
