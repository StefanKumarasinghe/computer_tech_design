<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Document</title>
</head>
<body>
  <h1>Score Entry</h1>

  <?php

    $round = $_POST['round'];
    $archer = $_POST['archer'];
    $equipment = $_POST['equipment'];
  ?>
    <form action="insertScore.php" method="post">
        <?php
            echo "<p> Archer: $archer</p>";
            echo "<p> Round: $round</p>";
        ?>
        <input type="hidden" name='round' value=<?php echo $round?>>
        <input type="hidden" name='archer' value=<?php echo $archer?>>
        <input type="hidden" name='equipment' value=<?php echo $equipment?>>

        <p>Range</p>
        <input type="text" name="range">
        <p>Number of ends</p>
        <input type="number" name="ends" id="endsNumber">
        <input type="button" id="doneButton" onclick="generateDropdown()" value = "Done">
        
        <div id="dropdownContainer"></div>

        <div id="submitWrapper" hidden>
            <input type="submit" value="Submit" >

        </div>
    </form>
    <?php
  
    ?>

</body>
</html>