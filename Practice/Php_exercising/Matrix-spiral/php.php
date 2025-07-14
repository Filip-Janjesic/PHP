<?php

if(isset($_POST['submit'])){

    $Column_num= (int) $_POST['BrojStupaca'];
    $Row_num=(int)$_POST['BrojRedaka'];
    $Startni_broj=$_POST['StartBroj'];
    isset($_POST['Obrnuto'])?$Reverse=$_POST['Obrnuto']: $Reverse='';
    isset($_POST['StranaKretanja'])? $MovementSide=$_POST['StranaKretanja']: $MovementSide='';
    isset($_POST['Kreniodsredine'])? $StartFromMiddle=$_POST['Kreniodsredine']:$StartFromMiddle='';

    //Pokreni ako su upisani brojevi 
    if($Column_num > 0 && $Row_num > 0 && $Startni_broj >= 0){
      $result = array(); //niz za matrix
      $result_arrows=(array)null; // niz za smjer
      $end_number= $Row_num*$Column_num; //najveći broj u nizu
      CreateArray($Column_num,$Row_num,$Reverse,$StartFromMiddle);
      if($Reverse){
          $result=Reverse($result, $_POST['BrojStupaca']);
      }
      $result_arrows= SetNullArrowsArray($result_arrows);
      MovementSide($MovementSide,$Reverse);

    }else{
      echo "Nije postavljen broj";
    }
  }


function CreateArray($column, $row,$Reverse,$StartFromMiddle){

    global $result;
    global $result_arrows; 
    global $end_number;  
    global $Startni_broj;
    $current_row= 1; // Trenutni red
    $current_column=1; // Trenutna kolona 
    $current_number= $StartFromMiddle == 'on' ? $end_number+$Startni_broj-1:$Startni_broj; // Trenutni broj koji ide u niz
    $number_of_rotate_arrays=0; //Key za 'rotate-arrays' niz
    $true=true; // if u for-u će se dogoditi samo jednom
    
            //Provjeri koliko je row i prođi kroz forloop toliko puta
            for ($z=0; $z <=$row; $z++) { 

               //Prolazak kroz matrix u 4 for-a
                for ($i=$current_column; $i <= $column; $i++) { 
                    //Zadnji broj će ući u 'rotate-arrays' i njega će trebati okrenuti
                    if($true){
                        $result_arrows['rotate-arrays'][$number_of_rotate_arrays++]=$StartFromMiddle == 'on'?$current_number+1:$current_number-1;
                        $true=false;
                    }
                    //Provjeri je li broj već dodan u neki red, ako nije dodaj mu stranu, red, kolonu,broj
                    if(isset($result[$current_row][$i])){                 
                        continue;
                    }else{
                        $result_arrows['left'][$current_number]=$current_number;
                    $result[$current_row][$i] = $StartFromMiddle == 'on'?$current_number--:$current_number++;
                    //Označi da je jedan red gotov i odredi poziciju za idući red
                    if($i == $column - $z){
                        $current_column=$i;
                        $true=true;
                    } 
                    }
                    
                }
                for ($a= $current_row; $a <= $row; $a++) { 

                    if($true){
                        $result_arrows['rotate-arrays'][$number_of_rotate_arrays++]=$StartFromMiddle == 'on'?$current_number+1:$current_number-1;
                        $true=false;
                    }
                    if(isset($result[$a][$current_column])){
                        continue;
                    }else{
                        $result_arrows['up'][$current_number]=$current_number;
                    $result[$a][$current_column]=$StartFromMiddle == 'on'?$current_number--:$current_number++;
                    if($a == $row - $z){
                        $current_row=$a;
                        $true=true;
                    }
                }
            }
                for ($b=$current_column; $b > 0; $b--) { 

                    if($true){
                        $result_arrows['rotate-arrays'][$number_of_rotate_arrays++]=$StartFromMiddle == 'on'?$current_number+1:$current_number-1;
                        $true=false;
                    }

                    if(isset($result[$current_row][$b])){
                        continue;
                    }else{
                        $result_arrows['right'][$current_number]=$current_number;
                    $result[$current_row][$b] = $StartFromMiddle == 'on'?$current_number--:$current_number++;
                    if($b == 1 + $z){
                        $current_column=$b;
                        $true=true;
                    } 
                }
            }
                for ($c= $current_row; $c >= 1; $c--) { 

                    if($true){
                        $result_arrows['rotate-arrays'][$number_of_rotate_arrays++]=$StartFromMiddle == 'on'?$current_number+1:$current_number-1;
                        $true=false;
                    }                    
                    if(isset($result[$c][$current_column])){
                        continue;
                    }else{
                        $result_arrows['down'][$current_number]=$current_number;
                    $result[$c][$current_column]=$StartFromMiddle == 'on'?$current_number--:$current_number++;
                    if($c == 2 +$z){
                        $current_row=$c;
                        $true=true;
                    }
                }
            }
        }
    }


//Obrnuto
function Reverse($array, $column)
{
    $a=0;
    foreach($array as $key){
        $a++;
    for ($i=1; $i <=$column; $i++) { 
        $result_column[$i][$a]=$key[$i];
        }
    }   
    return $result_column;
}

//Strana kretanja

function MovementSide($Side,$Reverse){

    global $result;
    switch ($Side) {
        case 'gore-desno':
            ShowResult_UpRight($Reverse);
            break;
        case 'dolje-desno':
            ShowResult_DownRight($Reverse);
            break;
        case 'dolje-lijevo':
            ShowResult_DownLeft($Reverse);
            break;
        case 'gore-lijevo':
            ShowResult_UpLeft($Reverse);
            break;    
        default:
            echo "Postavi smjer";
            break;
    }
}

function SetNullArrowsArray($Array){
        //U slučaju da ne može doći do loop-a bit će eror kad budemo prikazivali
        $Array['down'][0]=null;
        $Array['right'][0]=null;
        $Array['up'][0]=null;
        $Array['left'][0]=null;
        return $Array;
    }
   
function ShowResult_DownLeft($Reverse){    
        //Smjerovi
        global $result;
        global $result_arrows; 
        global $end_number;
        global $Startni_broj; 

        if($Reverse){
            $Direction=array('up','down','left','right');
            $td_direction=array('td-left-right','td-left-right','td-up-down','td-up-down');
            $Rotate_direction=array('td-left-down','td-right-up','td-right-down','td-left-up');
            $rows=$_POST['BrojStupaca'];
            $columns= $_POST['BrojRedaka'];
        }else{
            $Direction=array('left','right','up','down');
            $td_direction=array('td-left-right','td-left-right','td-up-down','td-up-down');
            $Rotate_direction=array('td-left-up','td-right-down','td-left-down','td-right-up');
            $rows=$_POST['BrojRedaka'];
            $columns=$_POST['BrojStupaca'];
        }

        //Prođi kroz redove i prikaži 
        echo '<table>';    
        for ($s=$rows; $s >=1 ; $s--){
            echo "<tr>";
            //Prođi kroz svaki broj u tom redu i provjeri kako treba biti okrenut
            for ($j=1; $j <=$columns; $j++) { 
                if($result[$s][$j] == $end_number+$Startni_broj-1 || $result[$s][$j] == $Startni_broj){
                    echo "<td class='td-no-back'>".$result[$s][$j]."</td>";                
                }else{
                for ($i=0; $i <=3 ; $i++) { 
                    if(in_array($result[$s][$j], $result_arrows[$Direction[$i]]) && !in_array($result[$s][$j], $result_arrows['rotate-arrays'])){
                        echo "<td class='$td_direction[$i]'>".$result[$s][$j]."</td>";   
                    }
                }
            }
                //Prođi kroz brojeve koji trebaju biti drugačije okrenuti u redu i okreni ih
                if(in_array($result[$s][$j], $result_arrows['rotate-arrays']) && $result[$s][$j] !=$end_number+$Startni_broj-1 && $result[$s][$j] !=$Startni_broj){
                
                for ($i=0; $i <= 3; $i++) { 
                    if($result[$s][$j] !== $Startni_broj && in_array($result[$s][$j], $result_arrows[$Direction[$i]])){
                        echo "<td class='$Rotate_direction[$i]'>".$result[$s][$j]."</td>";   
                    }
                }
            }
            
        }
        echo "</tr>";
    }
echo '</table>'; 
}

function ShowResult_DownRight($Reverse){    
    //Smjerovi
    global $result;
    global $result_arrows; 
    global $end_number; 
    global $Startni_broj; 

    if($Reverse){
        $Direction=array('up','down','left','right');
        $td_direction=array('td-left-right','td-left-right','td-up-down','td-up-down');
        $Rotate_direction=array('td-right-down','td-left-up','td-left-down','td-right-up');
        $rows=$_POST['BrojStupaca'];
        $columns= $_POST['BrojRedaka'];
    }else{
        $Direction=array('left','right','up','down');
        $td_direction=array('td-left-right','td-left-right','td-up-down','td-up-down');
        $Rotate_direction=array('td-right-up','td-left-down','td-right-down','td-left-up');
        $rows=$_POST['BrojRedaka'];
        $columns=$_POST['BrojStupaca'];
    }

    //Prođi kroz redove i prikaži 
    echo '<table>';    
    for ($s=$rows; $s >=1 ; $s--){
        echo "<tr>";
        //Prođi kroz svaki broj u tom redu i provjeri kako treba biti okrenut
        for ($j=$columns; $j >=1; $j--) { 
            if($result[$s][$j] == $end_number+$Startni_broj-1 || $result[$s][$j] == $Startni_broj){
                echo "<td class='td-no-back'>".$result[$s][$j]."</td>";                
            }else{
            for ($i=0; $i <=3 ; $i++) { 
                if(in_array($result[$s][$j], $result_arrows[$Direction[$i]]) && !in_array($result[$s][$j], $result_arrows['rotate-arrays'])){
                    echo "<td class='$td_direction[$i]'>".$result[$s][$j]."</td>";   
                }
            }
        }
            //Prođi kroz brojeve koji trebaju biti drugačije okrenuti u redu i okreni ih
            if(in_array($result[$s][$j], $result_arrows['rotate-arrays']) && $result[$s][$j] !=$end_number+$Startni_broj-1 && $result[$s][$j] !=$Startni_broj){
            
            for ($i=0; $i <= 3; $i++) { 
                if(in_array($result[$s][$j], $result_arrows[$Direction[$i]])){
                    echo "<td class='$Rotate_direction[$i]'>".$result[$s][$j]."</td>";   
                }
            }
        }
        
    }
    echo "</tr>";
}
echo '</table>'; 
}


function ShowResult_UpRight($Reverse){    
    //Smjerovi
    global $result;
    global $result_arrows; 
    global $end_number; 
    global $Startni_broj; 

    if($Reverse){
        $Direction=array('up','down','left','right');
        $td_direction=array('td-left-right','td-left-right','td-up-down','td-up-down');
        $Rotate_direction=array('td-right-up','td-left-down','td-left-up','td-right-down');
        $rows=$_POST['BrojStupaca'];
        $columns= $_POST['BrojRedaka'];
    }else{
        $Direction=array('left','right','up','down');
        $td_direction=array('td-left-right','td-left-right','td-up-down','td-up-down');
        $Rotate_direction=array('td-right-down','td-left-up','td-right-up','td-left-down');
        $rows=$_POST['BrojRedaka'];
        $columns=$_POST['BrojStupaca'];
    }

    //Prođi kroz redove i prikaži 
    echo '<table>';    
    for ($s=1; $s <=$rows ; $s++){
        echo "<tr>";
        //Prođi kroz svaki broj u tom redu i provjeri kako treba biti okrenut
        for ($j=$columns; $j >=1; $j--) { 
            if($result[$s][$j] == $end_number+$Startni_broj-1 || $result[$s][$j] == $Startni_broj){
                echo "<td class='td-no-back'>".$result[$s][$j]."</td>";                
            }else{
            for ($i=0; $i <=3 ; $i++) { 
                if(in_array($result[$s][$j], $result_arrows[$Direction[$i]]) && !in_array($result[$s][$j], $result_arrows['rotate-arrays'])){
                    echo "<td class='$td_direction[$i]'>".$result[$s][$j]."</td>";   
                }
            }
        }
            //Prođi kroz brojeve koji trebaju biti drugačije okrenuti u redu i okreni ih
            if(in_array($result[$s][$j], $result_arrows['rotate-arrays']) && $result[$s][$j] !=$end_number+$Startni_broj-1 && $result[$s][$j] !=$Startni_broj){
            
            for ($i=0; $i <= 3; $i++) { 
                if(in_array($result[$s][$j], $result_arrows[$Direction[$i]])){
                    echo "<td class='$Rotate_direction[$i]'>".$result[$s][$j]."</td>";   
                }
            }
        }
        
    }
    echo "</tr>";
}
echo '</table>'; 
}


function ShowResult_UpLeft($Reverse){    
    //Smjerovi
    global $result;
    global $result_arrows; 
    global $end_number; 
    global $Startni_broj; 

    if($Reverse){
        $Direction=array('up','down','left','right');
        $td_direction=array('td-left-right','td-left-right','td-up-down','td-up-down');
        $Rotate_direction=array('td-left-up','td-right-down','td-right-up','td-left-down');
        $rows=$_POST['BrojStupaca'];
        $columns= $_POST['BrojRedaka'];
    }else{
        $Direction=array('left','right','up','down');
        $td_direction=array('td-left-right','td-left-right','td-up-down','td-up-down');
        $Rotate_direction=array('td-left-down','td-right-up','td-left-up','td-right-down');
        $rows=$_POST['BrojRedaka'];
        $columns=$_POST['BrojStupaca'];
    }

    echo '<table>';    
    for ($s=1; $s <=$rows ; $s++){
        echo "<tr>";
        //Prođi kroz svaki broj u tom redu i provjeri kako treba biti okrenut
        for ($j=1; $j <=$columns; $j++) { 
            if($result[$s][$j] == $end_number+$Startni_broj-1 || $result[$s][$j] == $Startni_broj){
                echo "<td class='td-no-back'>".$result[$s][$j]."</td>";                
            }else{
            for ($i=0; $i <=3 ; $i++) { 
                if(in_array($result[$s][$j], $result_arrows[$Direction[$i]]) && !in_array($result[$s][$j], $result_arrows['rotate-arrays'])){
                    echo "<td class='$td_direction[$i]'>".$result[$s][$j]."</td>";   
                }
            }
        }
            //Prođi kroz brojeve koji trebaju biti drugačije okrenuti u redu i okreni ih
            if(in_array($result[$s][$j], $result_arrows['rotate-arrays']) && $result[$s][$j] !=$end_number+$Startni_broj-1 && $result[$s][$j] !=$Startni_broj){
            
            for ($i=0; $i <= 3; $i++) { 
                if(in_array($result[$s][$j], $result_arrows[$Direction[$i]])){
                    echo "<td class='$Rotate_direction[$i]'>".$result[$s][$j]."</td>";   
                }
            }
        }
        
    }
    echo "</tr>";
}
echo '</table>'; 
}