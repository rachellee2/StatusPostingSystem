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
    <!-- Form layout for Posting status -->
    <form action="poststatusprocess.php" method="post">
      <!-- Input field for Status Code -->
      <div class="input-field">
        <input type="text"name="pCode" id="pCode" pattern="[S][0-9999]{4}" Title="Code must contain capital letter S, followed by 4 numbers." placeholder="S, 4 numbers e.g. S8463" class="validate" required>
        <label class="active" for="pCode">Status Code (required): </label></br>
      </div>
      <!-- Input field for Status -->
      <div class="input-field">
        <input type="text"name="pStatus" pattern="[a-zA-Z0-9 ,.!?]+" title="Should only contain alphanumeric characters including spaces, comma, full stop, ? and !" placeholder="e.g. listening to Spotify" class="validate" required>
        <label class="active" for="pStatus">Status (required): </label></br>
      </div>
      <!-- Radio button for Share type -->
      <label>Share: </label>
      <p>
        <label>
          <input class="with-gap" name="pShare" value="public" type="radio"/>
          <span>Public</span>
        </label>
      </p>
      <p>
        <label>
          <input class="with-gap" name="pShare" value="friends" type="radio"/>
          <span>Friends</span>
        </label>
      </p>
      <p>
        <label>
          <input class="with-gap" name="pShare" value="only me" type="radio"/>
          <span>Only Me</span>
        </label>
      </p>
      <!-- Input field for Date -->
      <input type="date"name="pDate" required /><label>Date: </label></br>
      <!-- Check button for Permission type -->
      <label>Permission Type: </label>
      <p>
        <label>
          <input type="checkbox" class="filled-in" value="like" name="pPermission[]" />
          <span>Allow Like</span>
        </label>
      </p>
      <p>
        <label>
          <input type="checkbox"  class="filled-in" value="comment" name="pPermission[]" />
          <span>Allow Comment</span>
        </label>
      </p>
      <p>
        <label>
          <input type="checkbox" class="filled-in" value="share" name="pPermission[]" />
          <span>Allow Share</span>
        </label>
      </p>
      <!-- Post/Reset Buttons -->
      <div style="margin-top:60px">
        <input class="btn wave-effect waves-light blue" type="submit" value="Post">
        <input class="btn wave-effect waves-light teal" type="reset" value="Reset">
      </div>
    </form>
    <!-- Link to Homepage -->
    <div>
      <a href="index.html">Return to Homepage</a><br/>
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