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

    <?php
      # Connection to database
      session_start();
      include 'connectdb.php';

      # Get product ID from user
      $productId = $_GET['category'];
      $_SESSION['productId'] = $_GET['category'];
    ?>

    <br>
    <?php
      echo "<blockquote><h5>Product " . $productId . " Information:</h5></blockquote>"
    ?>
    <!-- Card format code -->
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              # Query to select product information using a product ID
              $query = "SELECT SUM(purchases.quantity) AS totalPurchases, products.productId, products.productDescription, products.costPerItem, (products.costPerItem * SUM(purchases.quantity)) AS totalSales FROM products, purchases WHERE products.productId = purchases.productId AND products.productId = " . $productId;
              $result = mysqli_query($connection,$query);
              if (!$result) {
                  echo "<a class='waves-effect waves-light btn' href='index2.php'>Go Back</a><br>";
                  die("databases query failed.");
              }
              echo "<table>";
              echo "<tr><th>Product ID</th><th>Product Description</th><th>Total # of Purchases</th><th>Cost Per Item</th><th>Total Sales</th>";
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["productId"] . "</td><td>" . $row["productDescription"] . "</td><td>" . $row["totalPurchases"] . "</td><td>" . $row["costPerItem"] . "</td><td>" . $row["totalSales"] . "</td>";
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