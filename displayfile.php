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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

      $customerId = $_GET['category'];
      $_SESSION['customerId'] = $_GET['category'];
    ?>

    <br>
    <?php
      echo "<blockquote><h5>Customer " . $customerId . " Image Information:</h5></blockquote>"
    ?>
    <div class="row">
      <div class="col s12 m4">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <?php
              /*
              $query = "SELECT * FROM customers WHERE customers.customerId = " . $customerId;
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
              */
            ?>
            <form action="uploadfile.php" id="uploadfile" method="post">
                <div class="input-field blue-grey darken-1">
                <input name="cusimage" id="cusimage" type="text" class="validate">
                <label for="cusimage">Customer Image URL</label>
                </div>
                <script type="text/javascript">
                  $('#uploadfile').submit(function() 
                  {
                      if ($.trim($("#cusimage").val()) === "") {
                          alert('Please enter all fields.');
                      return false;
                      }
                  });
                </script>
            <button class="btn waves-effect waves-light" type="submit" name="action">Update Phone Number
              <i class="material-icons right">send</i>
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <a class="waves-effect waves-light btn" href="index2.php">Go Back</a>
  </body>
</html>