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
    <blockquote><h5>Product Information:</h5></blockquote>
    <!-- Card format code -->
    <div class="row">
      <div class="col s12 m4">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              # Connection to database
              session_start();
              include 'connectdb.php';

              # Query to select unpurchased products from products table
              $query = "SELECT * FROM products WHERE productId NOT IN (SELECT productId FROM purchases)";
              $result = mysqli_query($connection,$query);
              if (!$result) {
                  die("database query failed.");
              }
              echo "<table>";
              echo "<tr><th>Product ID</th><th>Product Description</th>";
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["productId"] . "</td><td>" . $row["productDescription"] . "</td>";
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