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
    include "db_connect.inc";

    $round = $_POST['round'];
    $archer = $_POST['archer'];
    $equipment = $_POST['equipment'];

    function displayRange()
    {
        $ranges = retrieveRange();

        for($i=0; $i<count($ranges); $i++)
        {
            echo ("<option value=".$ranges[$i]." selected>".$ranges[$i]."</option>\n");
        }
        return;
    }

    function displayEnds()
    {
        $ranges = retrieveRange();

        for($i=0; $i<count($ranges); $i++)
        {
            echo ("<option value=".$ranges[$i]." selected>".$ranges[$i]."</option>\n");
        }
        return;
    }

  ?>


    <form action="insertScore.php" method="post">
        <?php
        
            $conn = db();
            $query = "SELECT firstName, lastName FROM `competitors` WHERE player_id = $archer;";
            $result = mysqli_query($conn, $query);
            $output = array();

        if($result)
        {
            while($data = mysqli_fetch_array($result))
            {
                array_push($output, $data['firstName'], $data['lastName']);
            }
        }
       else
       {
        echo "Error";
       }
            echo "<p>" . $output[0]." ". $output[1]. ", " . $equipment . "</p>";
            echo "<p> Round " . $round . "</p>";
        ?>
        <input type="hidden" name='round' value=<?php echo $round?>>
        <input type="hidden" name='archer' value=<?php echo $archer?>>
        <input type="hidden" name='equipment' value=<?php echo $equipment?>>

        <div class="wrapper">
            <label for="range">Range</label>
            <select id="range" name="range" required>    
                 <?PHP displayRange(); ?>
            </select>
        </div>

        <div class="wrapper">
            <label for="end">End</label>
            <select id="endsNumber" name="end" required>    
                <option value="1" selected>1</option>
                <option value="2" selected>2</option>
                <option value="3" selected>3</option>
                <option value="4" selected>4</option>
                <option value="5" selected>5</option>
            </select>
        </div>

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