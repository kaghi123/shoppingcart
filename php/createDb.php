<?php

class createDb{
    public $servername;
    public $uername;
    public $password;
    public $dbname;
    public $tablename;
    public $con;
    
    public function __construct($dbname ="georgeka_shoppingcart", $tablename = "producttb", $servername = "localhost", $username = "georgeka_user", $password = "theteng1098"){
        
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        
        //create connection
        $this->con = mysqli_connect($servername, $username, $password, $dbname);
        
        //check connection
        if(!$this->con){
            die("Connection failed: ".mysql_connect_error());
        }
    }
    
    
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";
        
        $result = mysqli_query($this->con, $sql);
        
        if(mysqli_num_rows($result) > 0){
            return $result;
        }

    }
}