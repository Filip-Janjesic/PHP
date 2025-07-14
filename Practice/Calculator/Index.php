<?php 
include "Functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form action="" method="POST">
    
        <label for="FirstNumber">First number</label>
        <input type="number" name="FirstNumber" id="FirstNumber" value='<?php ShowInInput('FirstNumber')?>' placeholder="Insert number">
        <br>
        <label for="">Choice operation</label>
        <select name="Operations">
        <option value="<?php ShowInInput('Operations')?>"><?php ShowInInput('Operations')?></option> 
        <br>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
        </select>
        <br>
        <label for="SecondNumber">Second number</label>
        <input type="number" name="SecondNumber" id="SecondNumber" value='<?php ShowInInput('SecondNumber')?>' placeholder="Insert number">
        <br>
        <input type="submit" name="submit" value="Calculate">

    </form>
</body>
</html>