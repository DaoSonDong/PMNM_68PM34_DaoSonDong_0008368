<?php
require_once '../App/core/DB.php';
class LophocModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = ConnectDB::Connect();
    }

    public function getAllLophoc()
    {
        $query = "SELECT * FROM lophoc";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM lophoc WHERE ID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = "INSERT INTO lophoc (MaLop, TenLop, GhiChu) VALUES (:malop, :tenlop, :ghichu)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $data['malop']);
        $stmt->bindParam(':tenlop', $data['tenlop']);
        $stmt->bindParam(':ghichu', $data['ghichu']);
        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $query = "UPDATE lophoc SET MaLop = :malop, TenLop = :tenlop, GhiChu = :ghichu WHERE ID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':malop', $data['malop']);
        $stmt->bindParam(':tenlop', $data['tenlop']);
        $stmt->bindParam(':ghichu', $data['ghichu']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM lophoc WHERE ID = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function paging($limit = 5, $offset = 0)
    {
        $query = "SELECT * FROM lophoc ORDER BY ID ASC LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $countQuery = $this->conn->query("SELECT COUNT(*) FROM lophoc");
        $totalRecord = $countQuery->fetchColumn();
        $totalPage = ceil($totalRecord / $limit);

        return ['lophoc' => $result, 'totalPage' => $totalPage];
    }
}
?>