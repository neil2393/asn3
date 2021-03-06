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
    <!-- Navigation bar code -->
    <nav>
    <div class="nav-wrapper grey darken-3">
      <a href="#" class="brand-logo center">CS3319 Assignment 3 Neil Patel</a>
    </div>
    </nav>

    <!-- Card format code -->
    <br>
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              # Connection to database
              session_start();
              include 'connectdb.php';

              # Get customer ID from user
              $customerId = $_GET['category'];
              $_SESSION['customerId'] = $_GET['category'];

              # Query to delete customer using customer ID
              $query = "DELETE FROM customers WHERE customerId = " . $customerId;
              $result = mysqli_query($connection,$query);
              if (!$result) {
                echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                die("Error - Cannot delete due to constraints. Customer ID is referenced elsewhere.<br>" . mysqli_error($connection));
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
      <!-- Card format code -->
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <?php
              # Code to show customer data
              include 'getcustomerdata.php';
              ?>
            </div>
          </div>
        </div>
      </div>

    <!-- Go back button -->
    <a class="waves-effect waves-light btn" href="index2.php">Go Back</a>
  </body>
</html>