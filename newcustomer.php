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

              $customerId = (int)$_POST["customerId"];
              $firstName = $_POST["firstName"];
              $lastName = $_POST["lastName"];
              $city = $_POST["city"];
              $phoneNumber = (int)$_POST["phoneNumber"];
              $agentId = (int)$_POST["agentId"];

              if ($customerId == 0 || $phoneNumber == 0 || $agentId == 0) {
                echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                die("Error - Please make sure you complete all values. Please make sure Customer ID, Phone Number, and Agent ID are integer values. Try again.");
              }

              $query = "SELECT * FROM customers";
              $result = mysqli_query($connection,$query);
              if (!$result) {
                die("databases query failed.");
              }
              while ($row = mysqli_fetch_assoc($result)) {
                if ($row["customerId"] == $customerId) {
                  echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                  die("Error - You cannot use an existing customer ID. Try again.");
                }
              }
              
              $query1 = 'INSERT INTO customers (customerId, firstName, lastName, city, phoneNumber, agentId) VALUES ("' . $customerId . '", "' . $firstName . '", "' . $lastName . '", "' . $city . '", "' . $phoneNumber . '", "' . $agentId . '");';
              if (!mysqli_query($connection, $query1)) {
                echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                die("Error - Please make sure your Agent ID exists. Try again.<br>" . mysqli_error($connection));
              }
              echo 'Your new customer was successfully added.';
              mysqli_close($connection);
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