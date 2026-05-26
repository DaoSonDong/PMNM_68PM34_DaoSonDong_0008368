<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background: #f4f6f9;
            padding: 40px;
        }

        h1{
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        table{
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        table th{
            background: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }

        table td{
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover{
            background: #f1f1f1;
            transition: 0.3s;
        }

        table tr:last-child td{
            border-bottom: none;
        }
    </style>
</head>

<body>

    <h1>Danh sách sinh viên</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>MSSV</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
        </tr>

    <?php foreach ($sinhvien as $index => $sinhvien): ?>
        <tr>
            <td><?php echo $index + 1; ?></td>
            <td><?php echo $sinhvien['MSSV']; ?></td>
            <td><?php echo $sinhvien['Hoten']; ?></td>
            <td><?php echo $sinhvien['Gioitinh']; ?></td>
        </tr>
    <?php endforeach; ?>

    </table>

</body>
</html>