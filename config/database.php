<?php

namespace Config;

class Database {
    private static $instance = null;
    private $connection;

    // Konstruktor privat untuk menghindari instansiasi langsung dari luar
    private function __construct() {
        try {
            // Menggunakan variabel lingkungan (ENV) untuk koneksi database
            $this->connection = new \PDO(
                "mysql:host=" . $_ENV['DB_HOST'] . 
                ";dbname=" . $_ENV['DB_NAME'], 
                $_ENV['DB_USER'], 
                $_ENV['DB_PASS']
            );
            // Mengatur agar koneksi melemparkan exception jika terjadi error
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Koneksi Database Gagal: " . $e->getMessage());
        }
    }

    // Mengembalikan instance tunggal dari kelas ini
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Mengembalikan koneksi database yang telah dibuat
    public function getConnection() {
        return $this->connection;
    }
}
