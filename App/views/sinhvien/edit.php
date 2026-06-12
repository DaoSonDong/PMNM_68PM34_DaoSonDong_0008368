<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .form-container {
            width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
        }
        .form-container button {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .form-container a {
            display: inline-block;
            margin-top: 12px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Sửa sinh viên</h1>
        <form action="/sinhvien/update/<?php echo $sinhvien['ID']; ?>" method="POST">
            <label for="mssv">MSSV:</label>
            <input type="text" id="mssv" name="mssv" value="<?php echo $sinhvien['MSSV']; ?>" required>

            <label for="hoten">Họ tên:</label>
            <input type="text" id="hoten" name="hoten" value="<?php echo $sinhvien['Hoten']; ?>" required>

            <label for="gioitinh">Giới tính:</label>
            <input type="text" id="gioitinh" name="gioitinh" value="<?php echo $sinhvien['Gioitinh']; ?>" required>

            <label for="lophoc">Lớp học:</label>
            <input type="text" id="lophoc" name="lophoc" value="<?php echo $sinhvien['Lophoc']; ?>" required>
            
            <button type="submit">Cập nhật</button>
        </form>
        <a href="/sinhvien/index">Quay lại danh sách</a>
    </div>
</body>
</html>
