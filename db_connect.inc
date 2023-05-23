<?php
    $host = "feenix-mariadb.swin.edu.au";
	$user = "s104001913";
	$pwd = "";
	$sql_db = "s104001913_db";

    function db()
    {
        session_start();        // starts session for user

        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn) 
        {
            echo("Database Connection error so it has been closed");    // error handling if no database
            exit();
        }
        else 
	    {
            return $conn;
        }
    }

    function competition(name, round_num, gender, date, ageGroup, championship)
    {
        $conn = db();

        $query = "INSERT INTO `competitions` (`name`, `round_num`, `gender`, `date`, `ageGroup`, `championship`) VALUES ('$name', '$round_num', '$gender', '$date', '$ageGroup', '$championship');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function competitiors(firstName, lastName, gender, age)
    {
        $conn = db();

        $query = "INSERT INTO `competitors` (`firstName`, `lastName`, `gender`, `age`) VALUES ('$firstName', '$lastName', '$gender', '$age');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function round(rangeNum, equipment, score)
    {
        $conn = db();

        $query = "INSERT INTO `round` (`rangeNum`, `equipment`, `score`) VALUES ('$rangeNum', '$equipment', '$score');";
        $result = mysqli_query($conn, $query);

        exit();
    }

     function pRound(playerID, roundID)
    {
        $conn = db();

        $query = "INSERT INTO playerRound (player_id, round_id) VALUES ('$playerID', '$roundID');"
        $result = mysqli_query($conn, $query);

        exit();
    }

    function range(distance, targetFace, score)
    {
        $conn = db();

        $query = "INSERT INTO `range` (`distance`, `targetFace`, `score`) VALUES ('$distance', '$targetFace', '$score');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function pRange(playerID, rangeID)
    {
        $conn = db();

        $query = "INSERT INTO playerRange (player_id, range_id) VALUES ('$playerID', '$rangeID');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function end(shotID, score)
    {
        $conn = db();

        $query = "INSERT INTO `end` (`end_id`, `shotId`, `score`) VALUES ('$shotID', '$score');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function pEnd(playerID, $endID)
    {
        $conn = db();

        $query = "INSERT INTO `playerEnd` (`player_id`, `end_id`) VALUES ('$playerID', '$endID');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function shot(score)
    {
        $conn = db();

        $query = "INSERT INTO `shot` (`score`) VALUES ('$score');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function compResults(compID, roundID, rangeID, endID)
    {
        $conn = db();

        $query = "INSERT INTO `compResults` (`competition_id`, `round_id`, `range_id`, `end_id`) VALUES ('$compID', '$roundID', '$rangeID', '$endID');"; 
        $result = mysqli_query($conn, $query);

        exit();
    }

?>