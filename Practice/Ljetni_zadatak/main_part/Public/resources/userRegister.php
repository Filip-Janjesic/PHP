<?php



class Register{

    public $name;
    public $lastname;
    public $email;
    public $password;
    public $confirm_password;
    public $errors=[
        'name' => '',
        'lastname'=>'',
        'email' => '',
        'password' => '',
        'complete' => ''
    ];

    
    public function __construct(){
        $this->name = $_POST["Firstname"];
        $this->lastname = $_POST["Lastname"];
        $this->email = $_POST["Email"];
        $this->password = $_POST["Password"];
        $this->confirm_password = $_POST["Confirm-Password"];        
    }

    public function CheckErrors(){

        global $Db;
        $rowNames = ['*'];
        $where = ['email'];
        $values = [$this->email];
        $emailExists = $Db-> Select('users',$rowNames,$where,$values);
        
        //Name
        if(empty($this-> name)){
            $this->errors['name']= "Canno't be empty";
            return $this->errors;
            
        }
        //Lastname
        elseif(empty($this-> lastname)){
            $this->errors['lastname']= "Canno't be empty";
            return $this->errors;
        }
        //Email
        elseif(empty($this-> email)){
             $this->errors['email']= "Canno't be empty"; 
             return $this->errors;
        }elseif(count($emailExists) != 0){
             $this->errors['email']= "Email exists"; 
             return $this->errors;
        }
        //Password
        elseif(empty($this-> password)){
            $this->errors['password']= "Canno't be empty"; 
            return $this->errors;
        }
        elseif($this -> password != $this ->confirm_password){
            $this->errors['password']= "Passwords must be the same"; 
            return $this->errors;
        }
        elseif(strlen($this -> password)<=5){
            $this->errors['password']= "Minimum 6 characters"; 
            return $this->errors;
        }else{
            $this-> createUser();
            $this->errors['complete']= "Account created please login now";
            return $this-> errors;
        }
    }

    public function CreateUser(){
        global $Db;
        $rowNames = ['name','lastname','role','email','password'];
        $values = [$this->name,$this->lastname,'user',strtolower($this->email),$this->HashPass()];
        $Db-> Insert('users',$rowNames,$values);
    }

    public function HashPass(){
        
        $options = [
            'cost' => 12,
        ];
        return password_hash($this->password,PASSWORD_BCRYPT,$options);
        

    }

}

$RegisterClass= New Register;