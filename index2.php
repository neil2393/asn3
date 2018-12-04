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

      <blockquote><h5>Products that a customer has purchased:</h5></blockquote>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Customer Purchase Information</span>
              <p>Choose a customer ID to see all of their purchases</p>
            </div>
            <div class="card-action">
                <!-- Dropdown Trigger -->
                <a class='dropdown-button btn' href='' data-activates='dropdown1'>Customer ID</a>
                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                  <li><a href="getpurchasedata.php?category=31">31</a></li>
                  <li><a href="getpurchasedata.php?category=12">12</a></li>
                  <li><a href="getpurchasedata.php?category=15">15</a></li>
                  <li><a href="getpurchasedata.php?category=14">14</a></li>
                  <li><a href="getpurchasedata.php?category=10">10</a></li>
                  <li><a href="getpurchasedata.php?category=21">21</a></li>
                  <li><a href="getpurchasedata.php?category=13">13</a></li>
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
              <p>Sort product information in the following orders:</p>
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
              <p>Sort product information in the following orders:</p>
                <div class="input-field col s6 blue-grey darken-1">
                <input id="last_name" type="text" class="validate">
                <label for="last_name">Last Name</label>
                </div>
                <div class="input-field col s6 blue-grey darken-1">
                <input id="last_name" type="text" class="validate">
                <label for="last_name">Last Name</label>
                </div>
              <p>test</p>
            </div>
          </div>
        </div>
      </div>

<!--
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input placeholder="Placeholder" id="first_name" type="text" class="validate">
            <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="text" class="validate">
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input disabled value="I am not editable" id="disabled" type="text" class="validate">
            <label for="disabled">Disabled</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            This is an inline input field:
            <div class="input-field inline">
              <input id="email_inline" type="email" class="validate">
              <label for="email_inline">Email</label>
              <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
            </div>
          </div>
        </div>
      </form>
    </div>
-->

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