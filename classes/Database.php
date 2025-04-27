<?php
    class Database {
        private $host = "localhost";
        private $db_name = "articles";
        private $username = "root";
        private $password = "";
        private $conn;

        function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $e) {
                echo "Fail to connectin the Database: " . $e->getMessage();
            }

            return $this->conn;
        }
    }
?>