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
    include 'connectdb.php';
    ?> 

    <br>
    <h5>Customer Information:</h5>
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

    <h5>Products that a customer has purchased:</h5>
    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Customer Purchase Information</span>
            <p>Choose a customer ID to see all of their purchases</p>
          </div>
          <div class="card-action">
              <!-- Dropdown Trigger -->
              <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Customer ID</a>
              <!-- Dropdown Structure -->
              <ul id='dropdown1' class='dropdown-content'>
                <li><a href="getpurchasedata.php?customerId=31">31</a></li>
                <li><a href="getpurchasedata.php?customerId=12">12</a></li>
                <li><a href="getpurchasedata.php?customerId=15">15</a></li>
                <li><a href="getpurchasedata.php?customerId=14">14</a></li>
                <li><a href="getpurchasedata.php?customerId=10">10</a></li>
                <li><a href="getpurchasedata.php?customerId=21">21</a></li>
                <li><a href="getpurchasedata.php?customerId=13">13</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>

    <?php
      include 'getcustomerdata.php';
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