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

              # Get customer ID, product ID, and quantity from user using form
              $customerId = (int)$_POST["customerId"];
              $productId = (int)$_POST["productId"];
              $quantity = (int)$_POST["quantity"];

              # Check variable used to see if purchase is already pre-existing
              $check = 0;
              $query = 'SELECT * FROM purchases WHERE customerId = '. $customerId . ' AND productId = ' . $productId;
              $result = mysqli_query($connection, $query);
              if (!$result) {
                  echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                  die("Error.<br>" . mysqli_error($connection));
              }
              # Check variable will be >0 if purchase is pre-existing
              while ($row = mysqli_fetch_assoc($result)) {
                  $check += $row['customerId'];
              }
              mysqli_free_result($result);

              # Update value if purchase is pre-existing
              if($check > 0) {
                  # Only allows user to add values, not subtract
                  if($quantity > 0){
                      $query = 'UPDATE purchases SET quantity = quantity + ' . $quantity . ' WHERE customerId = '. $customerId . ' AND productId = ' . $productId;
                      if (!mysqli_query($connection, $query)) {
                          echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                          die("Error.<br>" . mysqli_error($connection));
                      }
                      echo "Your new purchase was successfuly updated.";
                  }
                  else {
                      echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                      die("Error - You can only enter positive quantities. Try again.");
                  }
              }
              # Inputs information collected from user if there is no pre-existing purchase
              else {
                  $query = 'INSERT INTO purchases(customerId, productId, quantity) VALUES(' . $customerId . ',' . $productId . ',"' . $quantity . '")';
                  if (!mysqli_query($connection, $query)) {
                      echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                      die("Error - Either the Customer ID or Product ID is incorrect. Try again.<br>" . mysqli_error($connection));
                  }
                  echo "Your new purchase was successfuly added.";
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <?php
      echo "<blockquote><h5>Updated Customer " . $customerId . " Purchase Information:</h5></blockquote>"
    ?>
    <!-- Card format code -->
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              # Connection to database
              session_start();
              include 'connectdb.php';

              # Get customer ID, product ID, and quantity from user using form
              $customerId = (int)$_POST["customerId"];
              $productId = (int)$_POST["productId"];
              $quantity = (int)$_POST["quantity"];

              # Query to show updated purchase information
              $query = "SELECT * FROM products, purchases, customers WHERE products.productId = purchases.productId AND purchases.customerId = customers.customerId AND customers.customerId = " . $customerId;
              $result = mysqli_query($connection,$query);
              if (!$result) {
                  die("databases query failed.");
              }
              echo "<table>";
              echo "<tr><th>Product ID</th><th>Product Description</th><th>Cost per Item</th><th>Quantity</th>";
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["productId"] . "</td><td>" . $row["productDescription"] . "</td><td>" . $row["costPerItem"] . "</td><td>" . $row["quantity"] . "</td>";
                  echo "</tr>";
              }
              mysqli_free_result($result);
              echo "</table>";
            ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Go back button -->
    <a class="waves-effect waves-light btn" href="index2.php">Go Back</a>
  </body>
</html>