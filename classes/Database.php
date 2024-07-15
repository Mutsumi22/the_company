<?php

class Database{
    // defolt localhost   (window's password なし)
    private $servername = 'localhost';  
    private  $username = 'root';
    private  $password = 'root';
    private  $dbname = 'the_company';  //mysql に接続する
    public $conn;

    public function __construct(){
        //new mysqli は翻訳機
        $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);

        if($this->conn->connect_error){
            die("Connection failed: " .$this->conn->connect_error);
        }
    }
}