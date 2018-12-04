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
            $query = "SELECT * FROM customers ORDER BY lastName";
            $result = mysqli_query($connection,$query);
            if (!$result) {
                die("databases query failed.");
            }
            echo "<table>";
            echo "<tr><th>Customer ID</th><th>First Name</th><th>Last Name</th><th>City</th><th>Phone Number</th><th>Agent ID</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["customerId"] . "</td><td>" . $row["firstName"] . "</td><td>" . $row["lastName"] . "</td><td>" . $row["city"] . "</td><td>" . $row["phoneNumber"] . "</td><td>" . $row["agentId"] . "</td>";
                echo "</tr>";
            }
            mysqli_free_result($result);
            echo "</table>";
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
 