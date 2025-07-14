<?php

if(isset($_POST['submit'])){

    $firstResult= strtolower($_POST['FirstName']).strtolower($_POST['SecondName']);
    $result= str_replace(' ','',$firstResult);

}

if(empty($result)){
    echo "<h2 style='color:red'>The fields are empty</h2>";
}else{
    for ($i=0; $i < strlen($result); $i++) { 
        $leter = substr($result, $i,1);
        $ResultArray[$i] = substr_count($result, $leter);
    }
    echo $firstRow = implode($ResultArray);
    echo CreateCalculator($firstRow);
}

function CreateCalculator(string $row)
{
    $data = floor(strlen($row)/2);
    $length=strlen($row);
    if($data >= 2 || $length == 3){
        if($length == 3){
            $data = 1;
        }
        for ($i=0; $i <= $data; $i++) { 
            if($i != $data){
                $ResultArray[$i] = substr($row,$i,1) + substr($row,strlen($row)-$i-1,1);
            }else{
                if(strlen($row) & 1){
                    $ResultArray[$i] = substr($row,$i,1);
                }
            }
        }
        echo '<hr>'.implode($ResultArray);
        return CreateCalculator(implode($ResultArray));
    }
    return "<h1>Result is " . $row ."</h1>";
}
