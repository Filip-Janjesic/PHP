<?php

class Reset_password
{
    

    function Create_token($Email){

        global $Database;
        $sql = "SELECT * FROM users where email = '$Database->Escape($Email)'";
        $result = $Database -> query($sql);
        if(!empty($result)){
            $token = random_bytes(20);
            $token= var_dump(bin2hex($token));
            $sql= "INSERT INTO users (Reset_password_token) values ('$Database->escape($token)') where email = '$Database->Escape($Email)'"
            //Šalji mail;
            return true;
        }else{
            return false;
        };
    }

    function Set_password($Token, $Password){

        global $Database;
        if(!Empty($token)){
            $sql = "UPDATE users set(password) values ('$Database -> escape($Password)) where Reset_password_token = '$token'";
            $Database -> query($sql);
            $Delete_sql= "DELETE token FROM users WHERE token='$Database->escape($Token)'";
            return true;
        }else{
            return false;
        }

    }

    }
}

$Reset_password=new Reset_password;

?>