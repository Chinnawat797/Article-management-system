<?php
    require_once './classes/Database.php';
    require_once './classes/Article.php';

    $db = new Database();
    $conn = $db->connect();

    $article = new Article($conn);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        if(!empty($title) && !empty($content)) {
            if($article->create($title, $content)) {
                header("Location: index.php");
                exit;
            }else{
                $error = "เกิดข้อผิดพลาดในการเพิ่มบทความ";
            }
        }else{
            $error = "กรอกข้อมูลให้ครบถ้วน";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create</title>
    <style>
        body {
            background-color: #1e1e2f;
            color: #f1f1f1;
        }
        .form-control, .form-control:focus {
            background-color: #2e2e3e;
            color: #f1f1f1;
            border-color: #555;
        }
    </style>
</head>
<body class="container py-5">
    <h2 class="mb-4">เพิ่มบทความใหม่</h2>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error)?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">หัวข้อทความ</label>
            <input type="text" id="title" name="title" class="form-control" required autofocus>
        </div>

        <div class="mb-2">
            <label for="content" class="form-label">เนื้อหา</label>
            <textarea name="content" id="content" class="form-control" rows="8" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="index.php" class="btn btn-secondary">กลับหน้าหลัก</a>
    </form>
</body>
</html>