<?php
class home
{
  public function index()
  {
    echo "Đây là trang chủ";
  }

  public function about()
  {
    echo "Đây là trang giới thiệu";
  }

  public function login()
  {
    require_once '../App/views/home/login.php';
  }
}