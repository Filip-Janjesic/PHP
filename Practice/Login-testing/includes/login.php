<?php

class login 
{
    public $id;
    public $role;
    public $is_login;

    function __construct(){

        $this -> check_the_login();
    
    }

    function Login($Email, $Password){

        if($this->Check_email_and_password($Email, $Password)){
            $_SESSION['Role'] = $this->role;
            $_SESSION['User_id'] = $this-> id; 
            $this -> is_login = true;
            return true;
        }else{
            return false;
        }

    }

    function Logout(){

        unset($this->id);
        unset($_SESSION['User_id']);
        $this -> is_login = false;

    }
    
    function Check_email_and_password($Email,$Password){

        global $Database;
        $Email = $Database -> escape($Email);
        
        $sql = "SELECT * FROM users WHERE email = '$Email'";
        $result=$Database -> query($sql);
        if(empty($result)){
            return false;
        }else{
        while($row= $result -> fetch_assoc()){
            $this -> id = $row['id'];
            $this -> role = $row['role'];
            $Hash_Pass= $row["password"];
        }
        if(isset($Hash_Pass) && password_verify($Password,$Hash_Pass)){
            return true; 
        }else{
           return false;
        }
    }
}

    private function check_the_login(){
		if(isset($_SESSION['User_id'])){
			$this -> is_login = true;
		}else{
			unset($this -> id);
			$this -> is_login = false;
		}
	}
}



$Login = new login();


?>