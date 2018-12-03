<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>




<body>

<nav>
<div class="nav-wrapper">
  <a href="#" class="brand-logo">CS3319 Assignment Neil Patel</a>
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
<h5>Customer Information:</h5>
<?php
include 'getcustomerdata.php';

$('.dropdown-button').dropdown({
  inDuration: 300,
  outDuration: 225,
  constrain_width: false, // Does not change width of dropdown to that of the activator
  hover: true, // Activate on hover
  gutter: 0, // Spacing from edge
  belowOrigin: false // Displays dropdown below the button
}
);
?>
<h5>Products that a customer has purchased:</h5>

<!-- Dropdown Trigger -->
<a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a>

<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content'>
<li><a href="#!">one</a></li>
<li><a href="#!">two</a></li>
<li class="divider" tabindex="-1"></li>
<li><a href="#!">three</a></li>
<li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
<li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
</ul>

<div class="row">
<div class="col s12 m6">
  <div class="card blue-grey darken-1">
    <div class="card-content white-text">
      <span class="card-title">Card Title</span>
      <p>I am a very simple card. I am good at containing small bits of information.
      I am convenient because I require little markup to use effectively.</p>
    </div>
    <div class="card-action">
      <a href="#">This is a link</a>
      <a href="#">This is a link</a>
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