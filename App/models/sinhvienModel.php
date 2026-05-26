<?php
require_once '../App/core/DB.php';
class SinhvienModel{
    private $conn;
    public function __construct(){
        $this->conn = ConnectDB::Connect();
    }
    public function getAllSinhvien(){
        $query = "SELECT * FROM sinhvien";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>