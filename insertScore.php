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
<?php
include "db_connect.inc";
$conn = db();

$round = $_POST['round'];
$archer = $_POST['archer'];
$equipment = $_POST['equipment'];
$end = $_POST["end"];

echo "<p> Archer: $archer</p>";
echo "<p> Round: $round</p>";
echo "<p> Equipment: $equipment</p>";
echo "<p> End: $end</p>";

$number = 0;
$overall = 0;
/*for ($i = 0; $i < $ends; $i++)
{*/
    for ($k = 1; $k <=5; $k++)
    {
        $num = 'score'.($k);
        $scores = $_POST['score'.($number)];
        echo "<p>$num $scores</p>";

        $overall += $scores;

        $shotID = shotInsert($scores);
        echo"<p>$shotID</p>";
        //shotInsert($scores);
        endInsert($shotID, $scores);
        $number++;
    }
    pEnd($archer, $end);
    echo "<br>";

        echo "<form action='enter_range.php' method='post'>
        <input type='hidden' name='round' value=".$round.">
        <input type='hidden' name='archer' value=".$archer.">
        <input type='hidden' name='equipment' value=".$equipment.">
        <input type='hidden' name='end' value=".($end+1).">
        <button type='submit'>Insert more scores</form>";

?>

<!---<form action="insertScore.php" method='post'>
        <input type="hidden" name='round' value=<?php echo $round?>>
        <input type="hidden" name='archer' value=<?php echo $archer?>>
        <input type="hidden" name='equipment' value=<?php echo $equipment?>>
        <input type="hidden" name='end' value=<?php echo $end+1?>>
        <input type="submit" value="Submit" >
</form-->

<!-- insert element to database -->


</body>
</html>