<?php
require_once '../App/core/Controller.php';
class sinhvien extends Controller
{
  public function index($limit = 5, $offset = 0, $search = '')
  {
    if (isset($_GET['search'])) {
      $search = trim($_GET['search']);
    }

    $currentPage = max(1, intval(floor($offset / $limit) + 1));
    $SinhvienModel = $this->model('SinhvienModel');
    $result = $SinhvienModel->paging($limit, $offset, $search);
    $sinhvien = $result['sinhvien'];
    $totalPage = $result['totalPage'];
    $this->view("layout/masterlayout", [
      'viewname' => 'sinhvien/index',
      'sinhvien' => $sinhvien,
      'totalPage' => $totalPage,
      'title' => 'Danh sách sinh viên',
      'currentPage' => $currentPage,
      'search' => $search
    ]);
  }

  public function create()
  {
    require_once '../App/views/sinhvien/create.php';
  }

  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'mssv' => $_POST['mssv'],
        'hoten' => $_POST['hoten'],
        'gioitinh' => $_POST['gioitinh']
      ];
      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->create($data);
      if ($result) {
        $_SESSION['success'] = "Thêm sinh viên thành công!";
        header("Location: /sinhvien/index");
        exit();
      } else {
        $_SESSION['error'] = "Thêm sinh viên thất bại!";
      }
    }
  }

  public function edit($id)
  {
    $sinhvienModel = $this->model('sinhvienModel');
    $sinhvien = $sinhvienModel->getById($id);
    if (!$sinhvien) {
      $_SESSION['error'] = "Sinh viên không tồn tại.";
      header("Location: /sinhvien/index");
      exit();
    }
    require_once '../App/views/sinhvien/edit.php';
  }

  public function update($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'mssv' => $_POST['mssv'],
        'hoten' => $_POST['hoten'],
        'gioitinh' => $_POST['gioitinh']
      ];
      $sinhvienModel = $this->model('sinhvienModel');
      $result = $sinhvienModel->update($id, $data);
      if ($result) {
        $_SESSION['success'] = "Cập nhật sinh viên thành công!";
      } else {
        $_SESSION['error'] = "Cập nhật sinh viên thất bại!";
      }
      header("Location: /sinhvien/index");
      exit();
    }
  }

  public function delete($id)
  {
    $sinhvienModel = $this->model('sinhvienModel');
    $result = $sinhvienModel->delete($id);
    if ($result) {
      $_SESSION['success'] = "Xóa sinh viên thành công!";
    } else {
      $_SESSION['error'] = "Xóa sinh viên thất bại!";
    }
    header("Location: /sinhvien/index");
    exit();
  }

  public function suggest($term = '')
  {
    if (isset($_GET['term'])) {
      $term = trim($_GET['term']);
    }
    $sinhvienModel = $this->model('sinhvienModel');
    $suggestions = $sinhvienModel->searchSuggestions($term);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($suggestions);
    exit();
  }
}
?>

