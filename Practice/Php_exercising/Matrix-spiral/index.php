<?php include 'function.php';
include 'Lang/Hrv.php';?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NASLOV;?></title>
    <link rel="stylesheet" href="assets/css/custom.css">
  </head>
<body>

<div class="flex-container">
  <div class="flex-item-left">
        <form action="" method="GET" id="language_form">
            <label for="Lang"><?php echo ODABERI_JEZIK?></label>
            <select name="Lang" onchange="changeLanguage()">
            <option value=""><?php echo ODABRANO;?>: <?php ShowInInputGet('Lang')?></option>
            <option value="Eng">Eng</option>
            <option value="Hrv">Hrv</option>
            </select>
        </form>

        <form action="" method="POST">        
          <hr>
          <br>
          <label for="StartBroj"><?php echo STARTNI_BROJ;?></label>
          <input class="custom-form" type="number" name="StartBroj" id="StartBroj" value="<?php ShowInInput('StartBroj')?>">
          <br>
          <label for="BrojRedaka"><?php echo BROJ_REDAKA;?></label>
          <input class="custom-form" type="number" name="BrojRedaka" id="BrojRedaka" value="<?php ShowInInput('BrojRedaka')?>">
          <br>
          <label for="BrojStupaca"><?php echo BROJ_STUPACA;?></label>
          <input class="custom-form" type="number" name="BrojStupaca" id="BrojStupaca" value="<?php ShowInInput('BrojStupaca')?>">
          <br>
          <label for="StranaKretanja"><?php echo STRANA_KRETANJA;?></label>
          <select name="StranaKretanja" id="StranaKretanja">
          <option value="<?php ShowInInput('StranaKretanja')?>"><b><?php echo ODABRANO;?>: <?php ShowInInput('StranaKretanja')?></b></option>
            <option value="gore-desno"><?php echo GORE_DESNO;?></option>
            <option value="dolje-desno"><?php echo DOLJE_DESNO;?></option>
            <option value="dolje-lijevo"><?php echo DOLJE_LIJEVO;?></option>
            <option value="gore-lijevo"><?php echo GORE_LIJEVO;?></option>
          </select>
          <br>
          <label for="Kreniodsredine"><?php echo KRENI_OD_SREDINE;?></label>
          <input type="checkbox" name="Kreniodsredine" id="Kreniodsredine" <?php ShowInInputChecked('Kreniodsredine')?>>
          <br>
          <label for="Obrnuto"><?php echo OBRNUTO;?></label>
          <input type="checkbox" name="Obrnuto" id="Obrnuto" <?php ShowInInputChecked('Obrnuto')?>>
          <br>
          <input type="submit" name="submit" value="<?php echo KREIRAJ_TABLICU;?>">
        </form>

    </div>
    <div class="flex-item-right">
      <?php 

      include 'php.php';
      ?>
</div>
</div>
</body>
</html>

<script>

  function changeLanguage(){
    document.getElementById('language_form').submit();
  }

</script>