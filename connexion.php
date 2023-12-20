<?php
require_once 'db_config.php';

class Database {
    private static $instance;
    private $connection;

    private function __construct() {
        $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

class Auth {
    public static function login($username, $password) {
        if ($username === 'admin' && $password === 'azerty123') {
            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;
            return true;
        } else {
            return false;
        }
    }

    public static function logout() {
        session_start();
        session_destroy();
        header('Location: login.php');
    }

    public static function isAuthenticated() {
        session_start();
        return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
    }
}
?>