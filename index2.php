
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<title>CS3319 Assignment 3</title>
</head>
<body>
<?php
include 'connectdb.php';
?> 
<h1>CS3319 Assignment 3</h1>
<h2>Customer Information</h2>
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