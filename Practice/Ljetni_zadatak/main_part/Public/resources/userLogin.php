<?php

class login {

    public $email;
    public $password;
    public $errors = [
        'email' => '',
        'password' => ''
    ];

    public function __construct(){
        if(isset($_POST["email-login"])){
        $this->email = strtolower($_POST["email-login"]);
        $this->password = $_POST["password-login"];     
        }
    }


    public function checkErrors(){

        //email
        if(empty($this->email)){
            $this->errors['email']= "Canno't be empty";
            return $this->errors;
        }
        if(!$this->checkEmail()){
            $this->errors['email']= "Email dose not exist. Please create new account";
            return $this->errors;
        }
        //password
        if(empty($this-> password)){
            $this->errors['password']= "Canno't be empty";
            return $this->errors;
        }
        if(!$this->checkPassword()){
            $this->errors['password']= "Incorrect password";
            return $this->errors;
        }else{
            $this -> loginUser();
        }
    }

    public function checkEmail(){

       global $Db;
       $rowNames=['*'];
       $where=['email'];
       $values=[$this->email];
       $result=$Db->Select('users',$rowNames,$where,$values); 
       if(count($result) != 0){
           return true;
       }else{
           return false;
       }
    }

    public function checkPassword(){

        global $Db;
        $rowNames=['*'];
        $where=['email'];
        $values=[$this->email];
        $result=$Db->Select('users',$rowNames,$where,$values);
        if(password_verify($this->password,$result[0]['password'])){
            return true;
        }else{
            return false;
        }
     }

     public function loginUser(){

        global $Db;
        $rowNames=['*'];
        $where=['email'];
        $values=[$this->email];
        $result=$Db->Select('users',$rowNames,$where,$values);
        $_SESSION['id'] = $result[0]['id'];
        $_SESSION['role'] = $result[0]['role']; 
        $_SESSION['name'] = $result[0]['name'];
        $_SESSION['lastname'] = $result[0]['lastname'];
        header('location: index.php');

     }

     public function logoutUser(){

        session_destroy();
        header('location: index.php?login');    
    }
}

$login=new login();
