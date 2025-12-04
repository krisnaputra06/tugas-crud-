<?php
class Database {
    private $host = "localhost";
    private $dbname = "dbbuku";
    private $username = "root";
    private $password = "Krisput190206";

    public function getConnection() {
        try {
            $conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
}                                   // created by I Wayan Krisna Eka PUtra ; 240030067
?>

