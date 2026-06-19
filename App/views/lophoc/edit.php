<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa lớp học</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #eef2f7;
            padding: 30px 20px;
            color: #1f2937;
        }
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            padding: 24px;
            border-radius: 20px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
        }
        .form-container h1 {
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            font-size: 1rem;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .btn-submit,
        .btn-back {
            padding: 12px 22px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 700;
            text-decoration: none;
            color: #ffffff;
        }
        .btn-submit {
            background: #2563eb;
        }
        .btn-back {
            background: #6b7280;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Sửa lớp học</h1>
        <form action="/lophoc/update/<?php echo $lop['ID']; ?>" method="POST">
           <label for="malop">Mã lớp:</label>
            <input type="text" id="malop" name="malop" value="<?php echo htmlspecialchars($lop['MaLop']); ?>" required>

            <label for="tenlop">Tên lớp:</label>
            <input type="text" id="tenlop" name="tenlop" value="<?php echo htmlspecialchars($lop['TenLop']); ?>" required>

            <label for="ghichu">Ghi chú:</label>
            <input type="text" id="ghichu" name="ghichu" value="<?php echo htmlspecialchars($lop['Ghichu']); ?>" required>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Cập nhật</button>
                <a href="/lophoc/index" class="btn-back">Quay lại</a>
            </div>
        </form>
    </div>
</body>
</html>