<?php

class MySQL_connect {

    private $connection;

    function __construct()
    {
        $this->openConnection();
    }

    public function openConnection(){
        $this->connection = mysqli_connect("localhost","root","root","store") or die("Connection to the Database Failed.");
    }

    public function query($sql) {

        $result = mysqli_query($this->connection, $sql);

        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result) {
        if (!$result) {
            die("Database query failed: " . mysqli_error($this->connection));
        }
    }

    // "database-neutral" methods
    public function fetch_assoc($result_set) {
        return mysqli_fetch_assoc($result_set);
    }

    public function num_rows($result_set) {
        return mysqli_num_rows($result_set);
    }

    public function insert_id() {
        // get the last id inserted over the current db connection
        return mysqli_insert_id($this->connection);
    }

    public function affected_rows() {
        return mysqli_affected_rows($this->connection);
    }

    public function escape_string($string) {
        return mysqli_real_escape_string($this->connection, $string);
    }

    public function closeConnection(){
        if(isset($this->connection)){
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }
}

$db = new MySQL_connect();

?>