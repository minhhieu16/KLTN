<?php

class DB{

    public $con;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "timesheet";

    function __construct(){
        $this->con = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
        
        if ($this->con->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        }
        
        $this->con->set_charset('utf8');
    }

}

?>