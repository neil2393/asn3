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

    <br>
    <!-- Card format code -->
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              # Connection to database
              session_start();
              include 'connectdb.php';

              # Get new customer information from user using form
              $customerId = (int)$_POST["customerId"];
              $firstName = $_POST["firstName"];
              $lastName = $_POST["lastName"];
              $city = $_POST["city"];
              $phoneNumber = $_POST["phoneNumber"];
              $agentId = (int)$_POST["agentId"];

              # Makes sure that customer ID and agent ID are integer values and not 0
              if ($customerId == 0 || $agentId == 0) {
                echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                die("Error - Please make sure Customer ID and Agent ID are integer values and not 0. Try again.");
              }

              # Query to select customer information
              $query = "SELECT * FROM customers";
              $result = mysqli_query($connection,$query);
              if (!$result) {
                die("databases query failed.");
              }
              while ($row = mysqli_fetch_assoc($result)) {
                # Makes sure that customer ID is non existent. If it is pre-existing, will give user an error.
                if ($row["customerId"] == $customerId) {
                  echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                  die("Error - You cannot use an existing customer ID. Try again.");
                }
              }
              
              # Query to insert new customer information into customers table
              $query1 = 'INSERT INTO customers (customerId, firstName, lastName, city, phoneNumber, agentId) VALUES ("' . $customerId . '", "' . $firstName . '", "' . $lastName . '", "' . $city . '", "' . $phoneNumber . '", "' . $agentId . '");';
              if (!mysqli_query($connection, $query1)) {
                echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                die("Error - Please make sure your Agent ID exists. Try again.<br>" . mysqli_error($connection));
              }
              echo 'Your new customer was successfully added.';
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
              # Show updated customer information
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