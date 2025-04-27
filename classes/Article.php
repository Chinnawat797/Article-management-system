<?php
    class Article {
        private $conn;
        private $table = "articles";

        public function __construct($db) {
            $this->conn = $db;
        }

        public function getAll() {
            $query = "SELECT * FROM " . $this->table . " ORDER BY create_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function create($title, $content) {
            $query = "INSERT INTO " . $this->table . " (title, content) VALUES (:title, :content)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);

            if($stmt->execute()){
                return true;
            }

            return false;
        }

        public function update($id, $title, $content) {
            $query = "UPDATE " . $this->table . " SET title = :title, content = :content WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":id", $id);

            if($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function delete($id) {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":id", $id);

            if($stmt->execute()) {
                return true;
            }

            return false;
        }

        public function find($id) {
            $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>