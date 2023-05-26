<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<?php
    include "db_connect.inc";

    function displayComp()
    {
        $competitions = retrieveComp();

        for($i=0; $i<count($competitions); $i++)
        {
            echo ("<option value=".$competitions[$i][0]." selected>".$competitions[$i][1]."</option>\n");
        }
        return;
    }

    function displayRound()
    {
       //echo "<script>document.getElementById('competition').value;</script>";
        $rounds = retrieveRound();

        foreach($rounds as $value)
        {
            echo ("<option value=".$value." selected>".$value."</option>\n");
            if($value == 5){break;}
        }

        return;
    }

    function displayArcher()
    {
        $archers = retrieveArchers();

        for($i=0; $i<20; $i++)
        {
            $name = $archers[$i][1]." ".$archers[$i][2];
            echo ("<option value='". $archers[$i][0] ."' selected>". $name ."</option>\n");
        }
        return;
    }

  ?>
<body id="body">
<h1>Score Entry</h1>
<form id='archer_form' action="enter_range.php" method='post'>
 <!--   <div class='wrapper'>
        <label for='competition'>Competition</label>
        <select name='competition' id='competition'>
            <?PHP //displayComp(); ?>
        </select>
    </div> -->

    <div class="wrapper">
    <label for="archer"><p>Archer</p></label>
    <select id="archer" name="archer" required>    
        <?PHP displayArcher(); ?>
    </select>
    </div>

    <div class="wrapper">
    <label for="round"><p>Round</p></label>
        <select name="round" id="round">
            <?PHP displayRound(); ?>
  </select>
</div>

    <div class="wrapper">
      <label for="equipment"><p>Equipment</p></label>
      <select id="equipment"name="equipment" required>    
        <option value="Recurve">Recurve</option>
        <option value="Compound">Compound</option>
        <option value="Recurve Barebow">Recurve Barebow</option>
        <option value="Compound Barebow">Compound Barebow</option>
        <option value="Longbow">Longbow</option>
</select>
      </div>
  
      <button type="submit">Submit</button>

  </form>
</body>
</html>