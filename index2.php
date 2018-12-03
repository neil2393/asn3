
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
<title>CS3319 Assignment 3</title>
</head>
<body>
<?php
include 'connectdb.php';
?> 
<h2>CS3319 Assignment 3</h1>
<h3>Customer Information:</h2>
<?php
include 'getcustomerdata.php';
?>
<h3>Products that a customer has purchased:</h2>

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