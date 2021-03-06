<?php
# Connection to database
include 'connectdb.php';
# Query to select customer information ordered by last name
$query = "SELECT * FROM customers ORDER BY lastName";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
echo "<table>";
echo "<tr><th>Customer ID</th><th>First Name</th><th>Last Name</th><th>City</th><th>Phone Number</th><th>Agent ID</th><th>Customer Image</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["customerId"] . "</td><td>" . $row["firstName"] . "</td><td>" . $row["lastName"] . "</td><td>" . $row["city"] . "</td><td>" . $row["phoneNumber"] . "</td><td>" . $row["agentId"] . "</td><td>";
    if($row['cusimage'] === null) {
      echo '<a href="displayfile.php?category=' . $row['customerId'] . '">Upload Image</a><br>';
    }
    else {
      echo '<img src="' . $row['cusimage'] . '" height="60" width="60">';
    }
    echo "</td></tr>";
}
mysqli_free_result($result);
echo "</table>";
?>