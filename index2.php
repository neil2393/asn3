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
    include 'connectdb.php';
    ?> 

      <br>
      <blockquote><h5>Customer Information:</h5></blockquote>
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

      <blockquote><h5>Products that a Customer has Purchased:</h5></blockquote>
      <div class="row">
        <div class="col s12 m8">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Customer Purchase Information</span>
              <p>Select a customer ID to see all of their purchases</p>
            </div>
            <div class="card-action">
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn' href='' data-activates='dropdown1'>Customer ID</a>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                  <?php
                    $query = "SELECT * FROM customers";
                    $result = mysqli_query($connection,$query);
                    if (!$result) {
                      die("databases query failed.");
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<li><a href='getpurchasedata.php?category=" . $row["customerId"] . "'>" . $row["customerId"] . "</a></li>";
                    }
                    mysqli_free_result($result);
                  ?>
                </ul>
            </div>
          </div>
        </div>
      </div>

      <blockquote><h5>Product Information:</h5></blockquote>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Product List</span>
              <p>Sort product information in the following orders</p>
            </div>
            <div class="card-action">
              <a class="waves-effect waves-light btn" href="getproductdata.php?category=ascDesc">Ascending Description</a>
              <a class="waves-effect waves-light btn" href="getproductdata.php?category=descDesc">Descending Description</a>
              <a class="waves-effect waves-light btn" href="getproductdata.php?category=ascPrice">Ascending Price</a>
              <a class="waves-effect waves-light btn" href="getproductdata.php?category=descPrice">Descending Price</a>
            </div>
          </div>
        </div>
      </div>

      <blockquote><h5>Insert New Purchase Information:</h5></blockquote>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">New Purchase</span>
              <p>Enter the following information to enter a new purchase</p>
              <form action="newpurchase.php" id="newpurchase" method="post">
                  <div class="input-field blue-grey darken-1">
                  <input name="customerId" id="customerId" type="text" class="validate">
                  <label for="customerId">Customer ID</label>
                  </div>
                  <div class="input-field blue-grey darken-1">
                  <input name="productId" id="productId" type="text" class="validate">
                  <label for="productId">Product ID</label>
                  </div>
                  <div class="input-field blue-grey darken-1">
                  <input name="quantity" id="quantity" type="text" class="validate">
                  <label for="quantity">Quantity</label>
                  </div>
                  <script type="text/javascript">
                    $('#newpurchase').submit(function() 
                    {
                        if ($.trim($("#customerId").val()) === "" || $.trim($("#productId").val()) === "" || $.trim($("#quantity").val()) === "") {
                            alert('Please enter all fields.');
                        return false;
                        }
                    });
                  </script>
              <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <blockquote><h5>Insert New Customer Information:</h5></blockquote>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">New Customer</span>
              <p>Enter the following information to enter a new customer</p>
              <form action="newcustomer.php" id="newcustomer" method="post">
                  <div class="input-field blue-grey darken-1">
                  <input name="customerId" id="customerId1" type="text" class="validate">
                  <label for="customerId">Customer ID</label>
                  </div>
                  <div class="input-field blue-grey darken-1">
                  <input name="firstName" id="firstName" type="text" class="validate">
                  <label for="firstName">First Name</label>
                  </div>
                  <div class="input-field blue-grey darken-1">
                  <input name="lastName" id="lastName" type="text" class="validate">
                  <label for="lastName">Last Name</label>
                  </div>
                  <div class="input-field blue-grey darken-1">
                  <input name="city" id="city" type="text" class="validate">
                  <label for="city">City</label>
                  </div>
                  <div class="input-field blue-grey darken-1">
                  <input name="phoneNumber" id="phoneNumber" type="text" class="validate">
                  <label for="phoneNumber">Phone Number</label>
                  </div>
                  <div class="input-field blue-grey darken-1">
                  <input name="agentId" id="agentId" type="text" class="validate">
                  <label for="agentId">Agent ID</label>
                  </div>
                  <script type="text/javascript">
                    $("#newcustomer").submit(function() 
                    {
                        if ($.trim($("#customerId1").val()) === "" || $.trim($("#firstName").val()) === "" || $.trim($("#lastName").val()) === "" || $.trim($("#city").val()) === "" || $.trim($("#phoneNumber").val()) === "" || $.trim($("#agentId").val()) === "") {
                            alert('Please enter all fields.');
                        return false;
                        }
                    });
                  </script>
              <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <blockquote><h5>Update Customer Phone Number Information:</h5></blockquote>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Update Phone Number</span>
              <p>Select a customer ID to update their phone number</p>
            </div>
            <div class="card-action">
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn' href='' data-activates='dropdown2'>Customer ID</a>
                <!-- Dropdown Structure -->
                <ul id='dropdown2' class='dropdown-content'>
                  <?php
                    $query = "SELECT * FROM customers";
                    $result = mysqli_query($connection,$query);
                    if (!$result) {
                      die("databases query failed.");
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<li><a href='displayphonenumber.php?category=" . $row["customerId"] . "'>" . $row["customerId"] . "</a></li>";
                    }
                    mysqli_free_result($result);
                  ?>
                </ul>
            </div>
          </div>
        </div>
      </div>

      <blockquote><h5>Delete Customer Information:</h5></blockquote>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Delete Customer</span>
              <p>Select a customer ID to delete their information</p>
            </div>
            <div class="card-action">
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn' href='' data-activates='dropdown3'>Customer ID</a>
                <!-- Dropdown Structure -->
                <ul id='dropdown3' class='dropdown-content'>
                  <?php
                    $query = "SELECT * FROM customers";
                    $result = mysqli_query($connection,$query);
                    if (!$result) {
                      die("databases query failed.");
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<li><a href='deletecustomer.php?category=" . $row["customerId"] . "'>" . $row["customerId"] . "</a></li>";
                    }
                    mysqli_free_result($result);
                  ?>
                </ul>
            </div>
          </div>
        </div>
      </div>

      <blockquote><h5>Customers That Have Purchased More Than a Given Quantity of Any Product:</h5></blockquote>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Quantity</span>
              <p>Select a quantity</p>
              <form action="quantity.php" id="quantity1" method="post">
                  <div class="input-field blue-grey darken-1">
                  <input name="quantity" id="quantity2" type="text" class="validate">
                  <label for="quantity">Quantity</label>
                  </div>
                  <script type="text/javascript">
                    $('#quantity1').submit(function() 
                    {
                        if ($.trim($("#quantity2").val()) === "") {
                            alert('Please enter all fields.');
                        return false;
                        }
                    });
                  </script>
              <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
              </button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <blockquote><h5>Products That Have Not Been Purchased:</h5></blockquote>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Product List</span>
              <p>Click the button to see products that have not been purchased</p>
            </div>
            <div class="card-action">
              <a class="waves-effect waves-light btn" href="unpurchasedproducts.php">Unpurchased Products</a>
            </div>
          </div>
        </div>
      </div>

      <blockquote><h5>Total Number of Purchases and Sales for a Particular Product:</h5></blockquote>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Total Number of Purchases/Sales per Product</span>
              <p>Select a product ID to see the total number of purchases and its sales</p>
            </div>
            <div class="card-action">
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn' href='' data-activates='dropdown4'>Product ID</a>
                <!-- Dropdown Structure -->
                <ul id='dropdown4' class='dropdown-content'>
                  <?php
                    $query = "SELECT * FROM products";
                    $result = mysqli_query($connection,$query);
                    if (!$result) {
                      die("databases query failed.");
                    }
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<li><a href='listproductdata.php?category=" . $row["productId"] . "'>" . $row["productId"] . "</a></li>";
                    }
                    mysqli_free_result($result);
                  ?>
                </ul>
            </div>
          </div>
        </div>
      </div>

    <?php
      mysqli_close($connection);
    ?>

  </body>
</html>

<?php
/*
ssh -i ~/.ssh/cs3319-vm144.pem vm144@cs3319.gaul.csd.uwo.ca
ssh centos@vm144
mysql -u root -p
cd /var/www/html

git add .
git commit -m "push scripts files"
git push origin master
*/
?>