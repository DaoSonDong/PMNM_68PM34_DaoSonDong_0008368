<?php
class sinhvien
{
  public function index()
  {
    // Trả về view
    require_once '../App/views/sinhvien/index.php';
  }

  public function create()
  {
    require_once '../App/views/sinhvien/create.php';
  }
}