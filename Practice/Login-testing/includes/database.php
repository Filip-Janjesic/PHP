<?php

include 'connection.php';
class Database 
{

    public $Connection;
    public $Database;

    function __construct(){

        $this-> Database = $this -> Open_connection();
    }

    function Open_connection(){
        $this-> Connection = new mysqli(HOST,USERNAME,PASSWORD,DB_NAME);
        if($this -> Connection -> connect_errno){
            die("Database connection failed" . $this -> Connection -> error);
        }
        return $this-> Connection;
    }


// ------------------------------------------------------------- //

    function Query($sql){

        $Query = $this -> Database -> query($sql);
        $this-> Comfirm_Query($Query);
        return $Query;
    }

// ------------------------------------------------------------- //

    private function Comfirm_Query($Result){
        
        if (!$Result) {
            die ("Query FAILED ".$this ->Database-> error);
        }
    }
        
// ------------------------------------------------------------- //

    function Escape($string){

        $Escape_string = mysqli_real_escape_string($this -> Database, $string);
        return $Escape_string;
    } 
}

$Database = new Database;

if(!$Database -> Connection){
	echo "Database connection = FALSE";
}else{
    echo "Database connection = TRUE";
}

?>