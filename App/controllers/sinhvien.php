<?php
require_once '../App/core/Controller.php';
class sinhvien extends Controller
{
  public function index($limit = 5, $offset = 0, $search = '')
  {
    $SinhvienModel = $this->model('SinhvienModel');
    $result = $SinhvienModel->paging($limit, $offset, $search);
    $sinhvien = $result['sinhvien'];
    $totalPage = $result['totalPage'];
    // // Trả về view
    // require_once '../App/views/sinhvien/index.php';
    $this->view("layout/masterlayout", ['viewname'=>'sinhvien/index', 'sinhvien'=>$sinhvien, 'totalPage'=>$totalPage, 'title' => 'Danh sách sinh viên']);
  }

  public function create()
  {
    require_once '../App/views/sinhvien/create.php';
  }

  public function store(){
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
}
?>
