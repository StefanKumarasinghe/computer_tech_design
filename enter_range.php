<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Roboto', sans-serif;
    }
</style>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="col-sm-6 mx-auto">
  <h1 class="display-6">Score Entry</h1>

  <?php
    $round = $_POST['round'];
    $archer = $_POST['archer'];
    $equipment = $_POST['equipment'];
  ?>
    <form action="insertScore.php" method="post">
        <?php
            echo "<p class='alert alert-warning p-3 my-1'> Archer: $archer</p>";
            echo "<p class='alert alert-success p-3 my-1'> Round: $round</p>";
        ?>
        <input type="hidden" name='round' value=<?php echo $round?>>
        <input type="hidden"  name='archer' value=<?php echo $archer?>>
        <input type="hidden"  name='equipment' value=<?php echo $equipment?>>

        <h3 class="fw-bold" >Range</p>
        <input type="text" name="range"  class="form-control my-1 p-3 w-100" >
        <h3  class="fw-bold"  >Number of ends</h3>
        <input type="number" name="ends" id="endsNumber"  class="form-control my-1 p-3 w-100">
        <input type="button" class="btn btn-primary p-2 m-1" id="doneButton" onclick="generateDropdown()" value="Done">
        
        <div id="dropdownContainer"></div>

        <div id="submitWrapper" hidden>
            <input type="submit" value="Submit" class="btn btn-success">
        </div>
    </form>
</div>
</div>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your custom script -->
    <script src="script.js"></script>
</body>
</html>
