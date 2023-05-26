<?php

            session_start();        // starts session for user

    function db()
    {
        $host = "feenix-mariadb.swin.edu.au";
	    $user = "s104001913";
	    $pwd = 
	    $sql_db = "s104001913_db";

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

    function competition($name, $round_num, $gender, $date, $ageGroup, $championship)
    {
        $conn = db();

        $query = "INSERT INTO `competitions` (`name`, `round_num`, `gender`, `date`, `ageGroup`, `championship`) VALUES ('$name', '$round_num', '$gender', '$date', '$ageGroup', '$championship');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function retrieveComp()
    {
        $conn = db();

        $query = "SELECT competition_id, name FROM competition;";
        $result = mysqli_query($conn, $query);

        $output = array();

        if($result)
        {
            while($data = mysqli_fetch_array($result))
            {
                array_push($output, array($data['competition_id'], $data['name']));
            }

            return $output;
        }
       else
       {
        echo "Error";
       }
    }

     function retrieveArchers()
    {
        $conn = db();

        $query = "SELECT player_id, firstName, lastName, gender FROM competitors;";
        $result = mysqli_query($conn, $query);

         $output = array();

        if($result)
        {
            while($data = mysqli_fetch_array($result))
            {
                array_push($output, array($data['player_id'], $data['firstName'], $data['lastName'], $data['gender']));
            }

            return $output;
        }
       else
       {
        echo "Error";
       }
    }

    function retrieveRound()
    {
        $conn = db();

       /* $query = "SELECT competition_id FROM competitions WHERE name = '$compName';";
        $result = mysqli_query($conn, $query); */

        $query = "SELECT round_id FROM round";
        $result =  mysqli_query($conn, $query);

         $output = array();

        if($result)
        {
            while($data = mysqli_fetch_array($result))
            {
                array_push($output, $data['round_id']);
            }

            return $output;
        }
       else
       {
        echo "Error";
       }
    }

    function retrieveRange()
    {
        $conn = db();

        $query = "SELECT range_id FROM `range`;";
        $result = mysqli_query($conn, $query);

        $output = array();

        if($result)
        {
            while($data = mysqli_fetch_array($result))
            {
                array_push($output, $data['range_id']);
            }
            return $output;
        }
       else
       {
        echo "Error";
       }
    }

    function retrieveEnd()
    {
        $conn = db();

        $query = "SELECT range_id FROM `range`;";
        $result = mysqli_query($conn, $query);

        $output = array();

        if($result)
        {
            while($data = mysqli_fetch_array($result))
            {
                array_push($output, $data['range_id']);
            }
            return $output;
        }
       else
       {
        echo "Error";
       }
    }

    function retrieveShot()
    {
        $conn = db();

        $query = "SELECT shotid FROM `shot`;";
        $result = mysqli_query($conn, $query);

        $output = array();

        if($result)
        {
            while($data = mysqli_fetch_array($result))
            {
                array_push($output, $data['shotid']);
            }
            return $output;
        }
       else
       {
        echo "Error";
       }
    }

    function competitiors($firstName, $lastName, $gender, $age)
    {
        $conn = db();

        $query = "INSERT INTO `competitors` (`firstName`, `lastName`, `gender`, `age`) VALUES ('$firstName', '$lastName', '$gender', '$age');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function roundInsert($rangeNum, $equipment, $score)
    {
        $conn = db();

        $query = "INSERT INTO `round` (`rangeNum`, `equipment`, `score`) VALUES ('$rangeNum', '$equipment', '$score');";
        $result = mysqli_query($conn, $query);

        exit();
    }

     function pRound($playerID, $roundID)
    {
        $conn = db();

        $query = "INSERT INTO playerRound (player_id, round_id) VALUES ('$playerID', '$roundID');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function rangeInsert($distance, $targetFace, $score)
    {
        $conn = db();

        $query = "INSERT INTO `range` (`distance`, `targetFace`, `score`) VALUES ('$distance', '$targetFace', '$score');";
        $result = mysqli_query($conn, $query);

        exit();
    }

    function pRange($playerID, $rangeID)
    {
        $conn = db();

        $query = "INSERT INTO playerRange (player_id, range_id) VALUES ('$playerID', '$rangeID');";
        $result = mysqli_query($conn, $query);
    }

    function endInsert($shotID, $score)
    {
        $conn = db();

        $query = "INSERT INTO `end` (`shotId`, `score`) VALUES ('$shotID', '$score');";
        $result = mysqli_query($conn, $query);
    }

    function pEnd($playerID, $endID)
    {
        $conn = db();

        $query = "INSERT INTO `playerEnd` (`player_id`, `end_id`) VALUES ('$playerID', '$endID');";
        $result = mysqli_query($conn, $query);
    }

    function shotInsert($score)
    {
        $conn = db();

        $query = "INSERT INTO `shot` (`score`) VALUES ('$score');";
        $result = mysqli_query($conn, $query);

        $shots = retrieveShot();
        return $shots[count($shots)-1];
    }

    function compResults($compID, $roundID, $rangeID, $endID)
    {
        $conn = db();

        $query = "INSERT INTO `compResults` (`competition_id`, `round_id`, `range_id`, `end_id`) VALUES ('$compID', '$roundID', '$rangeID', '$endID');"; 
        $result = mysqli_query($conn, $query);

        exit();
    }

?>