<?php


class database {

    private $host = 'localhost';
    private $db = 'hiperion_pp21';
    private $user = 'hiperion';
    private $password = 'Hiperion90875';    
    public $connection;
     

    public function __construct(){
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=UTF8";
        $this ->connection = new PDO($dsn, $this->user, $this->password);
        
    }

    public function Insert($tableName,$rowNames,$values){
        $rows="";
        $questionMark='';
        foreach($rowNames as $row){
            $rows = $rows . $row. ",";
            $questionMark = $questionMark . "?,";
        }
        $rows= substr($rows, 0,-1);
        $questionMark= substr($questionMark, 0,-1);

        $sql= "INSERT into $tableName ($rows) values ($questionMark)";
        $statement = $this -> connection -> prepare($sql);
        $statement->execute($values);
        $this->Confirm_sql($statement);
    }
    
    //U $values na zadnjem mjestu stavljam id za where 
    public function Update($tableName,$rowNames,$values){
        $rows="";
        foreach($rowNames as $row){
            $rows = $rows . $row."=?,";
        }
        $rows= substr($rows, 0,-1);

        $sql= "UPDATE $tableName SET $rows WHERE id=?";
        $statement = $this -> connection -> prepare($sql);
        $statement->execute($values);
        $this->Confirm_sql($statement);
    }

    public function Delete($tableName,$values){

        $sql= "DELETE FROM $tableName WHERE id=?";
        $statement = $this -> connection -> prepare($sql);
        $statement->execute($values);
        $this->Confirm_sql($statement);
    }

    //ako želiš povuci sve iz baze ostavi where prazno 
    public function Select($tableName,$rowNames,array $where=[], array $values=[], $limit = 1000, $offset=0){

        $rows="";
        foreach($rowNames as $row){
            $rows = $rows . $row.",";
        }
        $rows= substr($rows, 0,-1);

        $whereArray="";
        foreach($where as $row){
            $whereArray = $whereArray . $row."=?,";
        }
        $whereArray= substr($whereArray, 0,-1);
        if($where != null){
        $sql= "SELECT $rows FROM $tableName WHERE $whereArray LIMIT $limit OFFSET $offset";
        $statement = $this -> connection -> prepare($sql);
        $statement->execute($values);
        return $result = $statement->fetchall();
    }else{
        $sql= "SELECT $rows FROM $tableName LIMIT $limit OFFSET $offset";
        $statement = $this -> connection -> prepare($sql);
        $statement->execute();
        return $result = $statement->fetchall();
    }
        $this->Confirm_sql($statement);
    }
     
    private function Confirm_sql($query){
        if (!$query) {
            die($this ->connection->errorInfo());
        }
    }

    public function Search($tableName,$rowNames,array $where=[],$like){

        $rows="";
        foreach($rowNames as $row){
            $rows = $rows . $row.",";
        }
        $rows= substr($rows, 0,-1);

        $whereArray="";
        foreach($where as $row){
            $whereArray = $whereArray . $row.",";
        }
        $whereArray= substr($whereArray, 0,-1);
        $sql= "SELECT $rows FROM $tableName WHERE $whereArray LIKE '%$like%'";
        $statement = $this -> connection -> prepare($sql);
        $statement->execute();
        return $result = $statement->fetchall();
        $this->Confirm_sql($statement);
    }
}
$Db = new Database;

?>