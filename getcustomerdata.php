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


<?php
/*
$query = "SELECT * FROM pet";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo $row["species"] . "</li>";
}
mysqli_free_result($result);
echo "</ol>";
?>

<?php
   $query = "SELECT * FROM owner";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Who are you looking up? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="petowners" value="';
        echo $row["ownerid"];
        echo '">' . $row["fname"] . " " . $row["lname"] . "<br>";
   }
   mysqli_free_result($result);
 */
?>