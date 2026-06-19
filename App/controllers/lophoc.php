<?php
require_once '../App/core/Controller.php';
class lophoc extends Controller
{
    public function index($limit = 5, $offset = 0)
    {
        $lophocModel = $this->model('LophocModel');
        $result = $lophocModel->paging($limit, $offset);
        $lophoc = $result['lophoc'];
        $totalPage = $result['totalPage'];
        $currentPage = max(1, intval(floor($offset / $limit) + 1));

        $this->view("layout/masterlayout", [
            'viewname' => 'lophoc/index',
            'lophoc' => $lophoc,
            'totalPage' => $totalPage,
            'currentPage' => $currentPage,
            'title' => 'Danh sách lớp học'
        ]);
    }

    public function create()
    {
        require_once '../App/views/lophoc/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'malop' => $_POST['malop'],
                'tenlop' => $_POST['tenlop'],
                'ghichu' => $_POST['ghichu']
            ];

            $lophocModel = $this->model('LophocModel');
            $result = $lophocModel->create($data);
            if ($result) {
                $_SESSION['success'] = "Thêm lớp học thành công!";
                header("Location: /lophoc/index");
                exit();
            } else {
                $_SESSION['error'] = "Thêm lớp học thất bại!";
                header("Location: /lophoc/create");
                exit();
            }
        }
    }

    public function edit($id)
    {
        $lophocModel = $this->model('LophocModel');
        $lop = $lophocModel->getById($id);
        if (!$lop) {
            $_SESSION['error'] = "Lớp học không tồn tại.";
            header("Location: /lophoc/index");
            exit();
        }
        require_once '../App/views/lophoc/edit.php';
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'malop' => $_POST['malop'],
                'tenlop' => $_POST['tenlop'],
                'ghichu' => $_POST['ghichu']
            ];

            $lophocModel = $this->model('LophocModel');
            $result = $lophocModel->update($id, $data);
            if ($result) {
                $_SESSION['success'] = "Cập nhật lớp học thành công!";
            } else {
                $_SESSION['error'] = "Cập nhật lớp học thất bại!";
            }
            header("Location: /lophoc/index");
            exit();
        }
    }

    public function delete($id)
    {
        $lophocModel = $this->model('LophocModel');
        $result = $lophocModel->delete($id);
        if ($result) {
            $_SESSION['success'] = "Xóa lớp học thành công!";
        } else {
            $_SESSION['error'] = "Xóa lớp học thất bại!";
        }
        header("Location: /lophoc/index");
        exit();
    }
}
?>