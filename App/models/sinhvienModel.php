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
    public function getById($id){
        $query = "SELECT * FROM sinhvien WHERE ID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data){
        $query = "INSERT INTO sinhvien (MSSV, HoTen, GioiTinh) VALUES (:mssv, :hoten, :gioitinh)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mssv', $data['mssv']);
        $stmt->bindParam(':hoten', $data['hoten']);
        $stmt->bindParam(':gioitinh', $data['gioitinh']);
        return $stmt->execute();
    }
    public function update($id, $data){
        $query = "UPDATE sinhvien SET MSSV = :mssv, HoTen = :hoten, GioiTinh = :gioitinh WHERE ID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mssv', $data['mssv']);
        $stmt->bindParam(':hoten', $data['hoten']);
        $stmt->bindParam(':gioitinh', $data['gioitinh']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function delete($id){
        $query = "DELETE FROM sinhvien WHERE ID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function paging($limit = 5, $offset = 0, $search = ''){
        if ($search !== '') {
            $searchTerm = '%' . $search . '%';
            $query = "SELECT * FROM sinhvien WHERE HoTen LIKE :search OR MSSV LIKE :search ORDER BY ID ASC LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        } else {
            $query = "SELECT * FROM sinhvien ORDER BY ID ASC LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($query);
        }

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($search !== '') {
            $countQuery = "SELECT COUNT(*) FROM sinhvien WHERE HoTen LIKE :search OR MSSV LIKE :search";
            $countStmt = $this->conn->prepare($countQuery);
            $countStmt->bindValue(':search', $searchTerm, PDO::PARAM_STR);
            $countStmt->execute();
            $totalRecord = $countStmt->fetchColumn();
        } else {
            $selectAllquery = $this->conn->query("SELECT COUNT(*) FROM sinhvien");
            $totalRecord = $selectAllquery->fetchColumn();
        }

        $totalPage = ceil($totalRecord / $limit);

        return ['sinhvien'=>$result, 'totalPage'=>$totalPage];
    }

    public function searchSuggestions($term = ''){
        $term = trim($term);
        if ($term === '') {
            return [];
        }

        $searchTerm = '%' . $term . '%';
        $query = "SELECT DISTINCT HoTen FROM sinhvien WHERE HoTen LIKE :search ORDER BY HoTen ASC LIMIT 8";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_column($rows, 'HoTen');
    }
}
?>