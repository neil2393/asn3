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
              $productId = (int)$_POST["productId"];
              $quantity = (int)$_POST["quantity"];

              if ($customerId && $productId && $quantity) { 
                $check = 0;
                $query = 'SELECT * FROM purchases WHERE customerId = '. $customerId . ' AND productId = ' . $productId;
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                    die("Error.<br>" . mysqli_error($connection));
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    // If purchase exists, value of $purchase_exists will be > 0
                    $check += $row['customerId'];
                }
                mysqli_free_result($result);

                // If already purchased, update value
                if($check > 0) {
                    // Makes sure they are adding and not deducting
                    if($quantity > 0){
                        $query = 'UPDATE purchases SET quantity = quantity + ' . $quantity . ' WHERE customerId = '. $customerId . ' AND productId = ' . $productId;
                        if (!mysqli_query($connection, $query)) {
                            echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                            die("Error.<br>" . mysqli_error($connection));
                        }
                        echo "Your new purchase was successfuly updated.";
                    }
                    else {
                      //  echo "Quantity should be positive!";
                        echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                        die("Error - You can only enter positive quantities. Try again.");
                    }
                }
                // Otherwise, insert values into purchases
                else {
                    $query = 'INSERT INTO purchases(customerId, productId, quantity) VALUES(' . $customerId . ',' . $productId . ',"' . $quantity . '")';
                    if (!mysqli_query($connection, $query)) {
                        echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                        die("Error - Either the Customer ID or Product ID is incorrect. Try again.<br>" . mysqli_error($connection));
                    }
                    echo "Your new purchase was successfuly added.";
                }
              }
              else {
                echo ''
              }
            ?>
          </div>
        </div>
      </div>
    </div>


    <?php
      echo "<blockquote><h5>Updated Customer " . $customerId . " Purchase Information:</h5></blockquote>"
    ?>
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              session_start();
              include 'connectdb.php';

              $customerId = (int)$_POST["customerId"];
              $productId = (int)$_POST["productId"];
              $quantity = (int)$_POST["quantity"];

              $query = "SELECT * FROM products, purchases, customers WHERE products.productId = purchases.productId AND purchases.customerId = customers.customerId AND customers.customerId = " . $customerId;
              //$query .= "customers.customerId = " . $customerId . ")";
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

    <a class="waves-effect waves-light btn" href="index2.php">Go Back</a>
  </body>
</html>