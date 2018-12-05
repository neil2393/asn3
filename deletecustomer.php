<!DOCTYPE html>
<html> 
  <head>
    <meta charset="utf-8">
    <style>
      table, th, td {
      border: 1px solid black;
      }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script>
      $('.dropdown-trigger').dropdown();
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  </head>

  <body>
    <nav>
    <div class="nav-wrapper grey darken-3">
      <a href="#" class="brand-logo center">CS3319 Assignment 3 Neil Patel</a>
    <!--
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    -->
    </div>
    </nav>

    <br>
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              session_start();
              include 'connectdb.php';

              $customerId = $_GET['category'];
              $_SESSION['customerId'] = $_GET['category'];

              $query = "DELETE FROM customers WHERE customerId = " . $customerId;
              $result = mysqli_query($connection,$query);
              echo $customerId
              if (!$result) {
                die("databases query failed.");
              }

              echo 'Your customer was successfully deleted.';
            ?>
          </div>
        </div>
      </div>
    </div>

    <?php
      echo "<blockquote><h5>Updated Customer Information:</h5></blockquote>"
    ?>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <?php
              include 'getcustomerdata.php';
              ?>
            </div>
          </div>
        </div>
      </div>

    <a class="waves-effect waves-light btn" href="index2.php">Go Back</a>
  </body>
</html>