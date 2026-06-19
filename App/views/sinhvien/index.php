<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        /* ===== MÀU CHỦ ĐẠO ===== */

        :root{
            --primary-dark:#4d4955;
            --table-header:#5f5b67;
            --purple:#7c6cf0;
            --purple-hover:#6958eb;
            --yellow:#f6c85f;
            --yellow-hover:#eab54a;
            --red:#d97b8a;
            --red-hover:#c96474;
            --background:#f5fbfb;
            --white:#ffffff;
            --border:#e5e7eb;
        }

        body{
            background:var(--background);
            color:#333;
        }

        /* ===== THANH MENU ===== */

        .sidebar{
            background:var(--primary-dark);
        }

        .sidebar-header{
            background:var(--primary-dark);
            color:white;
        }

        .menu a{
            color:white;
        }

        .menu a:hover{
            background:#625d6b;
        }

        /* ===== TOPBAR ===== */

        .topbar{
            background:var(--primary-dark);
            color:white;
        }

        /* ===== BẢNG ===== */

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        table th{
            background:var(--table-header);
            color:white;
            padding:12px;
            text-align:left;
        }

        table td{
            padding:12px;
            border-bottom:1px solid #f1f1f1;
        }

        table tbody tr:hover{
            background:#f8f8ff;
        }

        /* ===== NÚT TÌM KIẾM ===== */

        .btn-search{
            background:var(--purple);
            color:white;
            border:none;
            padding:10px 15px;
            border-radius:4px;
            cursor:pointer;
        }

        .btn-search:hover{
            background:var(--purple-hover);
        }

        /* ===== NÚT THÊM ===== */
        .action-bar{
            display:flex;
            justify-content:flex-end;
            margin-bottom:15px;
        }

        .btn-add{
            background:#8bc34a;
            color:white;
            padding:10px 15px;
            border:none;
            border-radius:4px;
            text-decoration:none;
        }

        .btn-add:hover{
            background:#7cb342;
        }

        /* ===== NÚT SỬA ===== */

        .btn-edit{
            background:var(--yellow);
            color:white;
            border:none;
            padding:8px 10px;
            border-radius:4px;
            text-decoration:none;
        }

        .btn-edit:hover{
            background:var(--yellow-hover);
        }

        /* ===== NÚT XÓA ===== */

        .btn-delete{
            background:var(--red);
            color:white;
            border:none;
            padding:8px 10px;
            border-radius:4px;
            text-decoration:none;
        }

        .btn-delete:hover{
            background:var(--red-hover);
        }

        /* ===== PHÂN TRANG ===== */
        .pagination{
            display:flex;
            justify-content:center;
            align-items:center;
            gap:8px;
            margin-top:20px;
        }

        .pagination a{
            padding:8px 12px;
            text-decoration:none;
            border:1px solid #d1d5db;
            color:#4d4955;
            border-radius:4px;
            background:transparent;
            transition:all 0.3s ease;
        }

        .pagination a:hover{
            background:#f3f4f6;
            border-color:#bfc5ce;
        }

        .pagination a.active{
            background:rgba(255,255,255,0.6);
            color:#4d4955;
            border-color:#bfc5ce;
            font-weight:bold;
        }

        /* ===== INPUT ===== */

        input,
        select{
            border:1px solid #ddd;
            padding:10px;
            border-radius:4px;
        }

        input:focus,
        select:focus{
            outline:none;
            border-color:var(--purple);
        }

        /* ===== CARD ===== */

        .card,
        .panel,
        .content-box{
            background:white;
            border:1px solid #ececec;
            border-radius:6px;
        }
    </style>
</head>

<body>
    <div class="page-header">
        <h1><?php echo $title; ?></h1>
        <form class="search-form" action="/sinhvien/index" method="get" autocomplete="off">
            <div class="search-field">
                <input id="search-input" type="text" name="search" placeholder="Tìm theo họ tên hoặc MSSV..." value="<?php echo htmlspecialchars($search ?? ''); ?>" />
                <button type="submit">Tìm</button>
            </div>
            <div id="search-suggestions" class="suggestions"></div>
        </form>
    </div>
    <div class="action-bar">
        <a href="/sinhvien/create" class="btn-add">
            Thêm sinh viên
        </a>
        </div>
    <div class="card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>MSSV</th>
                        <th>Họ tên</th>
                        <th>Giới tính</th>
                        <th>Lớp học</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    <?php foreach ($sinhvien as $sv): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo htmlspecialchars($sv['MSSV']); ?></td>
                        <td><?php echo htmlspecialchars($sv['Hoten']); ?></td>
                        <td><?php echo htmlspecialchars($sv['Gioitinh']); ?></td>
                        <td><?php echo htmlspecialchars($sv['Lophoc']); ?></td>
                        <td>
                            <div class="action-group">
                                <a href="/sinhvien/edit/<?php echo $sv['ID']; ?>" class="btn-edit">Sửa</a>
                                <a href="/sinhvien/delete/<?php echo $sv['ID']; ?>" class="btn-delete" onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">Xóa</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
        <div class="pagination">
            <?php
            $pagesize = 5;
            for ($i = 1; $i <= $totalPage; $i++) {
                $offset = ($i - 1) * $pagesize;
                $activeClass = (isset($currentPage) && $currentPage == $i) ? 'active' : '';
                echo "<a class='$activeClass' href='/sinhvien/index/$pagesize/$offset'>$i</a> ";
            }
            ?>
        </div>

    <script>
        const searchInput = document.getElementById('search-input');
        const suggestionsContainer = document.getElementById('search-suggestions');
        let suggestionTimer = null;

        const renderSuggestions = (items) => {
            if (!items || items.length === 0) {
                suggestionsContainer.innerHTML = '<div class="suggestions-list"><div class="suggestions-empty">Không tìm thấy gợi ý.</div></div>';
                return;
            }

            const html = items.map(item => `<div class="suggestion-item">${item}</div>`).join('');
            suggestionsContainer.innerHTML = `<div class="suggestions-list">${html}</div>`;
            document.querySelectorAll('.suggestion-item').forEach(el => {
                el.addEventListener('click', () => {
                    searchInput.value = el.textContent;
                    suggestionsContainer.innerHTML = '';
                    searchInput.focus();
                });
            });
        };

        const clearSuggestions = () => {
            suggestionsContainer.innerHTML = '';
        };

        searchInput.addEventListener('input', () => {
            const term = searchInput.value.trim();
            if (suggestionTimer) {
                clearTimeout(suggestionTimer);
            }

            if (term.length === 0) {
                clearSuggestions();
                return;
            }

            suggestionTimer = setTimeout(() => {
                const currentPath = window.location.pathname.replace(/\/+$|\/index(\/.*)?$/, '');
                const appBase = currentPath.replace(/\/sinhvien(\/.*)?$/, '/sinhvien');
                const suggestUrl = new URL(`${appBase}/suggest?term=${encodeURIComponent(term)}`, window.location.origin);

                fetch(suggestUrl.toString())
                    .then(response => response.json())
                    .then(data => renderSuggestions(data))
                    .catch(() => clearSuggestions());
            }, 240);
        });

        document.addEventListener('click', (event) => {
            if (!searchInput.contains(event.target) && !suggestionsContainer.contains(event.target)) {
                clearSuggestions();
            }
        });
    </script>
</body>
</html>