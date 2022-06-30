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
    <div class="row">
      <div class="col s12">
        <?php
          // relative path for the conf file that holds sql info
          require_once("../conf/settings.php");
          // The @ operator suppresses the display of any error messages
          // mysqli_connect returns false if connection failed, otherwise a connection value
          $conn = @mysqli_connect($sql_host,
            $sql_user,
            $sql_pass,
            $sql_db
          );
          // Checks if connection is successful
          if (!$conn) {
            // Displays an error message
            echo "<p>Database connection failure</p>";
          } else {
            // Upon successful connection
            // Get data from searching status form
            $search = $_GET["sStatus"];
            // Set up the SQL command to retrieve the data from the table
            $query = "SELECT * FROM statusData WHERE status LIKE '%$search%' ";
            // executes the query and store result into the result pointer
            $queryResult = mysqli_query($conn, $query) or die ("<p>Unable to create the result table.</p>"
                ."<p>Error no. " . mysqli_errno($conn)
                . ": " . mysqli_error($conn)) . "</p>"; 
            // checks if the execuion was successful
            if(!$queryResult){
              echo"Data doesn't exist.<br><br>";
            }
            // If no results, display a message
            if(mysqli_num_rows($queryResult) ==0){
              echo"No results found!<br>";
            }
            else {
              // Retrieve current record pointed by the result pointer
              // Display the retrieved records
              while ($row = mysqli_fetch_assoc($queryResult)){
                echo '<div class="card">';
                echo '<div class="card-content grey-text">';
                echo '<span class="card-title">' .$row["code"];
                echo '</span>';
                echo '<p><strong>Status: </strong> ' .$row["status"],'</p>';
                echo '<p><strong>Share: </strong> ' .$row["share"],'</p>';
                $dateFormat = $row["date"];
                echo '<p><strong>Date: </strong> ' .date('F d, Y', strtotime($dateFormat)), '</p>';
                echo '<p><strong>Permission Type: </strong> ' .$row["permission"],'</p>';
                echo '</div>';
                echo '</div>';
              }
            }
            // Frees up the memory, after using the result pointer
            mysqli_free_result($queryResult); 
            // close the database connection
            mysqli_close($conn);
          }
        ?>
      </div>
    </div></br>
    <!-- Links to Search/Homepage -->
    <div>
      <a style="float:left" href="searchstatus.html">Return to Search Status</a>
      <a style="float:right" href="index.html">Return to Homepage</a>
    </div>
  </div>
  <!-- Compiled and minified JavaScript -->
  <script type="text/Javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });
  </script>
  <div style="height: 100px;"></div>
</body>
</html>