<?php


function isLogin($page){

    if(isset($_SESSION['id'])){
        header('location:'. $page);
    }
}

function isLogout($page){

    if(!isset($_SESSION['id'])){
        header('location:'. $page);
    }
}


?>