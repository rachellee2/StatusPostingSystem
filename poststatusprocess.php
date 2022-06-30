<!DOCTYPE html>
<html lang="en">
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <title>Status Posting System</title>
</head>
<body>
  <!-- NAVIGATION BAR -->
  <nav>
    <div class="nav-wrapper indigo">
      <a href="index.html" class="brand-logo" style="padding-left:20px">Status Posting System</a>
      <!-- nav bar menu for medium to large screen -->
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.html">Home</a></li>
        <li><a href="poststatusform.php">Post</a></li>
        <li><a href="searchstatus.html">Search</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
    </div>
  </nav>
  <!-- nav bar menu for mobile screen -->
  <ul class="sidenav" id="mobile-demo">
    <li><a href="index.html">Home</a></li>
    <li><a href="poststatusform.php">Post</a></li>
    <li><a href="searchstatus.html">Search</a></li>
    <li><a href="about.html">About</a></li>
  </ul>
  <div class="container" style="margin-top:50px">
  <?php
    // relative path for the conf file that holds sql info
    require_once("../conf/settings.php");
    // The @ operator suppresses the display of any error messages
	  // mysqli_connect returns false if connection failed, otherwise a connection value
	  $conn= @mysqli_connect($sql_host,$sql_user,$sql_pass,$sql_db); 
    $sql_table = "statusData";
    //checks if connection is successful
    if(!$conn){
      // Displays an error message if connection failed
      die("<p>Database connection failure :(</p>");
    } else{
      // Upon successful connection,
      // Create statusData table is not exists already
      $query = "CREATE TABLE IF NOT EXISTS statusData(
        code VARCHAR(5) NOT NULL UNIQUE,
        status VARCHAR(255) NOT NULL,
        share VARCHAR(255),
        date VARCHAR(10) NOT NULL,
        permission VARCHAR(255))";	
      // executes the query
      $queryResult = mysqli_query($conn, $query);
      // Get data from the form
      $code    = $_POST["pCode"];
      $status	= $_POST["pStatus"];
      $share	= $_POST["pShare"];
      $date	= $_POST["pDate"];
      $permission	= $_POST["pPermission"];
      $permission = implode(' ', $permission);
      // Set up the SQL command to add the data into the table
      $query = "insert into $sql_table"
            ."(code, status, share, date, permission)"
          . "values"
            ."('$code', '$status', '$share', '$date', '$permission')";
      // executes the query
      $queryResult = mysqli_query($conn, $query);
      // checks if the execution was successful'
      if(!$queryResult) {
        echo "<p>Something is wrong with adding this status. ",	"Error no.", mysqli_errno($conn),": ",mysqli_error($conn) ,".</p>";
      } else {
        // display an operation successful message
        echo "<p>Status added successfully!</p>";
      }
      // Frees up the memory, after using the result pointer
      mysqli_free_result($queryResult); 
      // close the database connection
      mysqli_close($conn);
    }
  ?>
  </br>
    <!-- links to Post/Homepage -->
    <div>
      <a style="float:left" href="poststatusform.php">Return to Post Status</a>
      <a style="float:right" href="index.html">Return to Homepage</a>
    </div>
  </div>
  <!-- Compiled and minified JavaScript -->
  <script type="text/Javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!-- Initialization for the nav bar menu for mobile-sized screen -->
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });
  </script>
</body>
</html>