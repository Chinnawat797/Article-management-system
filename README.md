# ระบบจัดการบทความ (Article Management System) ด้วย PHP OOP

## รายละเอียด
ระบบจัดการบทความนี้เป็นตัวอย่างการพัฒนาเว็บไซต์ที่ใช้หลักการ OOP (Object-Oriented Programming) โดยใช้ภาษา PHP และ MySQL สำหรับจัดการข้อมูลบทความในฐานข้อมูล ระบบนี้สามารถเพิ่ม, แก้ไข, ลบ, และแสดงบทความได้

## ฟีเจอร์
- เพิ่มบทความใหม่
- แก้ไขบทความที่มีอยู่
- ลบบทความ
- แสดงรายการบทความทั้งหมด
- แสดงรายละเอียดของบทความ

## เทคโนโลยีที่ใช้
- PHP (OOP)
- MySQL
- HTML, CSS (สำหรับการแสดงผล)
- Bootstrap (สำหรับการจัดรูปแบบ UI)

## การติดตั้ง
1. **ติดตั้ง XAMPP** หรือ **WAMP** (หากยังไม่มี)
2. **โหลดไฟล์โปรเจค** นี้ไปไว้ในโฟลเดอร์ `htdocs` (หากใช้ XAMPP) หรือในโฟลเดอร์เว็บเซิร์ฟเวอร์ที่คุณใช้
3. เปิด **phpMyAdmin** แล้วสร้างฐานข้อมูลใหม่ชื่อ `article_management`
4. นำเข้าไฟล์ SQL สำหรับสร้างตารางที่อยู่ในโฟลเดอร์ `database` หรือคัดลอก SQL ด้านล่างไปใช้ได้เลย:
    ```sql
    -- สร้างฐานข้อมูล
    CREATE DATABASE IF NOT EXISTS article_management;

    -- เลือกฐานข้อมูล
    USE article_management;

    -- สร้างตารางสำหรับบทความ
    CREATE TABLE IF NOT EXISTS articles (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- ตัวอย่างข้อมูล (Optional)
    INSERT INTO articles (title, content) VALUES
    ('บทความแรก', 'เนื้อหาของบทความแรก'),
    ('บทความที่สอง', 'เนื้อหาของบทความที่สอง'),
    ('บทความที่สาม', 'เนื้อหาของบทความที่สาม');
    ```

5. ตั้งค่าการเชื่อมต่อฐานข้อมูลในไฟล์ `config.php` โดยกรอกข้อมูลดังนี้:
    ```php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'article_management');
    ``
## การใช้งาน
1. เปิดเบราว์เซอร์แล้วไปที่ `http://localhost/your-project-folder/`
2. เข้าสู่ระบบ (ถ้ามีระบบล็อกอิน) หรือเริ่มใช้งานได้ทันที
3. คุณสามารถเพิ่มบทความใหม่ได้จากหน้าฟอร์ม เพิ่มบทความ
4. แก้ไขหรือลบบทความได้จากรายการบทความ