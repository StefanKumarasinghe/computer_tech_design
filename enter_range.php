
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
   <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>    
    <title>Document</title>
</head>
<body class="bg-dark text-white">
    <div class="container-fluid">
        <div class="col-sm-6 mx-auto mt-5 pt-5">
  <h1 class="display-6 mt-5">Score Entry</h1>

  <?php
 if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: archer.html');
    exit;
}
    $round = $_POST['round'];
    $archer = $_POST['archer'];
    $equipment = $_POST['equipment'];
  
  ?>
        <form action="insertScore.php" class="mt-2" method="post">
        <?php
        
            echo "        <p class='my-2 alert alert-primary fw-bold text-primary'> The archer's name is $archer</p><p class='alert alert-primary my-2 fw-bold text-danger'> The round is  $round</p>       ";
        ?>
      <input type="hidden" name='round' value=RoundA>
        <input type="hidden"  name='archer' value=jkdav>
        <input type="hidden"  name='equipment' value=jsadc>

        <h3 class="fw-bold mt-5" >Range</p>
        <input type="text" name="range"  class="form-control my-1 mt-4 p-3 w-100" >
        <h3  class="fw-bold mt-5"  >Number of ends</h3>
        <input type="number" name="ends" id="endsNumber"  class="form-control mt-4 my-1 p-3 w-100">
        <input type="button" class="btn btn-primary p-2 mt-3" id="doneButton" onclick="generateDropdown()" value="Done">
        
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
