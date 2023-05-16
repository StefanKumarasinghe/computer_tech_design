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

$round = $_POST['round'];
$archer = $_POST['archer'];
$equipment = $_POST['equipment'];
$ends = $_POST["ends"];

echo "<p> Archer: $archer</p>";
echo "<p> Round: $round</p>";
echo "<p> Equipment: $equipment</p>";
echo "<p> Ends: $ends</p>";

$number = 0;
for ($i = 0; $i <= $ends-1; $i++)
{
    for ($k = 1; $k <=5; $k++)
    {
        $num = 'score'.($k);
        $scores = $_POST['score'.($number)];
        echo "<p>$num $scores</p>";
        $number++;
    }
    echo "<br>";

}

?>



<!-- insert element to database -->


</body>
</html>