<?php
    require_once './classes/Database.php';
    require_once './classes/Article.php';

    $db = new Database();
    $conn = $db->connect();

    $article = new Article($conn);

    $id = $_GET['id'] ?? '';

    if($id) {
        if($article->delete($id)) {
            header('Location: index.php');
            exit;
        }else{
            echo "เกิดข้อผิดในการลบ";
        }
    }else{
        header('Location: index.php');
        exit;
    }

?>