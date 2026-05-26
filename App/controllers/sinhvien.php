<?php
require_once '../App/core/Controller.php';
class sinhvien extends Controller
{
  public function index()
  {
    $SinhvienModel = $this->model('SinhvienModel');
    $sinhvien = $SinhvienModel->getAllSinhvien();
    // // Trả về view
    // require_once '../App/views/sinhvien/index.php';
    $this->view('sinhvien/index', ['sinhvien' => $sinhvien, 'title' => 'Danh sách sinh viên']);
  }

  public function create()
  {
    require_once '../App/views/sinhvien/create.php';
  }
}
?>