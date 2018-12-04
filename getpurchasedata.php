
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

    <br>
    <h5>Customer Purchase Information:</h5>
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php

              var link = $('a').attr('href');
              var equalPosition = link.indexOf('='); //Get the position of '='
              var number = link.substring(equalPosition + 1);

              $query = "SELECT * FROM products WHERE product_id IN (SELECT purchases.productId FROM purchases, customers WHERE purchases.customerId = customers.customerId AND ";
              $query .= "customers.customerId = " . number . ")";
              $result = mysqli_query($connection, $query);
              if (!$result) {
                  die("databases query failed.");
              }
              echo "<table>";
              echo "<tr><th>Product ID</th><th>Product Description</th><th>Cost per Item</th><th>Items on Hand</th>";
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row["productId"] . "</td><td>" . $row["productDescription"] . "</td><td>" . $row["costPerItem"] . "</td><td>" . $row["itemsOnHand"] . "</td>";
                  echo "</tr>";
              }
              mysqli_free_result($result);
              mysqli_close($connection);
              echo "</table>";
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
 </html>
 