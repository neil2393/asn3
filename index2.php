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
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">CS3319 Assignment 3 Neil Patel</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
    <!--
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
    -->
      </ul>
    </div>
    </nav>

    <?php
    include 'connectdb.php';
    ?> 

    <div class="row">
      <div class="col s12 m6">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">Customer Information</span>
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
            <span class="card-title">Card Title</span>
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
          </div>
          <div class="card-action">
              <!-- Dropdown Trigger -->
              <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Drop Me!</a>
              <!-- Dropdown Structure -->
              <ul id='dropdown1' class='dropdown-content'>
                <li><a href="#!">one</a></li>
                <li><a href="#!">two</a></li>
                <li class="divider"></li>
                <li><a href="#!">three</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>

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
  </html>