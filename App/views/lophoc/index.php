<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>     

    /* ===== RESET LAYOUT (QUAN TRỌNG) ===== */
    * {
        box-sizing: border-box;
    }

    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    /* ===== BODY FIX LỖI KHOẢNG TRẮNG + FOOTER ===== */
    body {
        background: #eef2f7;
        color: #333;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;

        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* ===== PAGE HEADER ===== */
    .page-header {
        max-width: 1040px;
        margin: 20px auto 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .page-header h1 {
        font-size: 1.9rem;
        margin: 0;
        color: #1f2937;
    }

    /* ===== BUTTON CREATE ===== */
    .btn-create {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 20px;
        border-radius: 999px;
        background: #10b981;
        color: #ffffff;
        text-decoration: none;
        font-weight: 600;
    }

    /* ===== CARD ===== */
    .card {
        max-width: 1040px;
        margin: 0 auto 20px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }

    /* ===== TABLE ===== */
    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 640px;
    }

    table th,
    table td {
        padding: 14px 16px;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid #e5e7eb;
    }

    table th {
        background: linear-gradient(135deg, #2563eb, #4338ca);
        color: #ffffff;
        font-weight: 600;
        letter-spacing: 0.02em;
    }

    table tbody tr:nth-child(even) {
        background: #f8fafc;
    }

    table tbody tr:hover {
        background: #e2e8f0;
    }

    /* ===== ACTION BUTTONS ===== */
    .action-group {
        display: flex;
        justify-content: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-edit,
    .btn-delete {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 999px;
        font-size: 0.95rem;
        text-decoration: none;
        font-weight: 600;
        color: #ffffff;
    }

    .btn-edit { background: #2563eb; }
    .btn-delete { background: #ef4444; }

    /* ===== PAGINATION ===== */
    .pagination {
        padding: 20px 16px;
        display: flex;
        justify-content: center;
        gap: 8px;
        flex-wrap: wrap;
        background: #f8fafc;
        border-top: 1px solid #e5e7eb;
    }

    .pagination a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        padding: 10px 14px;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        color: #1f2937;
        background: #ffffff;
        text-decoration: none;
        font-weight: 600;
    }

    .pagination a:hover,
    .pagination a.active {
        background: #2563eb;
        color: #ffffff;
        border-color: #2563eb;
    }

    </style>
</head>
<body>
    <div class="page-header">
        <h1><?php echo $title; ?></h1>
        <a class="btn-create" href="/lophoc/create">Thêm lớp mới</a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã lớp</th>
                        <th>Tên lớp</th>
                        <th>Ghi chú</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    <?php foreach ($lophoc as $lop): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo htmlspecialchars($lop['MaLop']); ?></td>
                        <td><?php echo htmlspecialchars($lop['TenLop']); ?></td>
                        <td><?php echo htmlspecialchars($lop['Ghichu']); ?></td>
                        <td>
                            <div class="action-group">
                                <a href="/lophoc/edit/<?php echo $lop['ID']; ?>" class="btn-edit">Sửa</a>
                                <a href="/lophoc/delete/<?php echo $lop['ID']; ?>" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa lớp này?')">Xóa</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <?php
            $pagesize = 5;
            for ($i = 1; $i <= $totalPage; $i++) {
                $offset = ($i - 1) * $pagesize;
                $activeClass = (isset($currentPage) && $currentPage == $i) ? 'active' : '';
                echo "<a class='$activeClass' href='/lophoc/index/$pagesize/$offset'>$i</a> ";
            }
            ?>
        </div>
    </div>
</body>
</html>