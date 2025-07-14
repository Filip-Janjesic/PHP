<?php
ob_start();
session_start();
$Database = Database();

function Database(){

    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = 'homeworklogin';

    $conn = mysqli_connect($host, $username, $password,$db_name);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }else{
        return $conn;
    }
}

function checkRegistration($Email,$Password){
    
    global $Database;
    $Email = strtolower(Escape_string($Email));
    $Password = Escape_string($Password);

    $sql = "SELECT * FROM users WHERE email = '$Email'";
    $result=mysqli_fetch_assoc(mysqli_query($Database, $sql));
    if(empty($result)){
        $sql= "INSERT INTO users (email,password) values ('$Email','$Password')";
        mysqli_query($Database, $sql);
        return true;
    }else{
        return false;
    }       
}

function RegistrationErrors($Email,$Password,$Confirm_password){

    if(empty($Email) || empty($Password) || empty($Confirm_password)){
        return "Fields must not be empty";
    }elseif($Password !== $Confirm_password){
        return "Passwords are not the same";
    }elseif(strlen($Password) < 6){
        return "Password must have a minimum of 6 characters";
    }elseif(!checkRegistration($Email,$Password)){
        return "Email exists";
    }
    header("Location: index.php");
}

function loginError($Email,$Password){

    if(Login($Email,$Password)){
        header("Location: content.php");
    }else{
    $_SESSION['error'] = "Incorrect email or password";
    header("Location: index.php");
    }
}

function Login($Email,$Password){

    global $Database;
    $Email= strtolower($Email);
    $sql = "SELECT * FROM users where email='$Email' and password='$Password'";
    $result=mysqli_fetch_assoc(mysqli_query($Database, $sql));
    if(empty($result)){
        return false;
        echo "false";
    }else{
        $_SESSION['id'] = $result['id'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['rool'] = $result['rool'];
        return true;
    }
}

function logout(){
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['rool']);
    header("Location: index.php");
}


function Escape_string($String){

    global $Database;
    $Result=mysqli_real_escape_string($Database,$String);
    return $Result;

}

function IsLogin(string $redirect){
    if(isset($_SESSION['id'])){
        header("Location:".$redirect);
    }
}
function IsLogout(string $redirect){
    if(empty($_SESSION['id'])){
        header("Location:".$redirect);
    }
}

?>