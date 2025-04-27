<?php
   require_once "./classes/Database.php";
   require_once "./classes/Article.php";

   $db = new Database();
   $conn = $db->connect();

   $article = new Article($conn);
   $articles = $article->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>index</title>
    <style>
        body {
            background-color: #1e1e2f;
            color: #f1f1f1;
        }
        .btn {
            border-radius: 0.25rem;
        }
        .table-dark th, .table-dark td {
            vertical-align: middle;
        }
        a.btn-sm {
            margin-right: 0.25rem;
        }
    </style>
</head>
<body class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>รายการบทความ</h2>
        <a href="create.php" class="btn btn-success">+ เพิ่มบทความใหม่</a>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-hover table-bordered align-middle">
            <thead class="table-light text-dark">
                <tr>
                    <th style="width: 20%;">หัวข้อ</th>
                    <th>เนื้อหา</th>
                    <th style="width: 18%;">วันที่สร้าง</th>
                    <th style="width: 15%;">การกระทำ</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = $articles->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']);?></td>
                    <td><?php echo nl2br(htmlspecialchars(substr($row['content'], 0, 100)));?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($row['create_at']));?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">แก้ไข</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('คุณแน่ใจว่าจะลบบทความนี้?');">ลบ</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>