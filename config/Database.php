<?php
class Database {
    private $host ="localhost";
    private $db_name ="tasks_management_system";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // echo "Connection successful!";
        } catch(PDOException $exception) {
            // echo "Connection failed:" . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>