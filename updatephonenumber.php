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

    <?php
      session_start();
      include 'connectdb.php';
    ?>

    <br>
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              $phoneNumber = (int)$_POST["phoneNumber"];

              if ($phoneNumber != int) {
                echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                die("Error - Please make sure Phone Number is an integer value. Try again.");
              }

              $query1 = "UPDATE customers SET phoneNumber = " . $phoneNumber . " WHERE customerId = " . $_SESSION['customerId'];
              $result = mysqli_query($connection,$query1);
              if (!$result) {
                die("databases query failed.");
              }
              echo "Your phone number was successfully updated.";
            ?>
          </div>
        </div>
      </div>
    </div>


    <?php
      echo "<blockquote><h5>Updated Customer " . $_SESSION['customerId'] . " Phone Number Information:</h5></blockquote>"
    ?>
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              $query = "SELECT * FROM customers WHERE customers.customerId = " . $_SESSION['customerId'];
              $result = mysqli_query($connection,$query);
              if (!$result) {
                  echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                  die("databases query failed.");
              }
              echo "<table>";
              echo "<tr><th>Customer ID</th><th>Phone Number</th></tr>";
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["customerId"] . "</td><td>" . $row["phoneNumber"] . "</td>";
                  echo "</tr>";
              }
              mysqli_free_result($result);
              echo "</table>";
            ?>
          </div>
        </div>
      </div>
    </div>

    <a class="waves-effect waves-light btn" href="index2.php">Go Back</a>
  </body>
</html>