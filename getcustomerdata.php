<?php
$query = "SELECT * FROM customers ORDER BY lastName";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<table>";
echo "<tr><th>First Name</th><th>Last Name</th><th>City</th><th>Phone Number</th><th>Customer ID</th><th>Agent ID</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["firstName"] . "</td><td>" . $row["lastName"] . "</td><td>" . $row["city"] . "</td><td>" . $row["phoneNumber"] . "</td><td>" . $row["customerId"] . "</td><td>" . $row["agentId"] . "</td>";
    echo "</tr>";
}
mysqli_free_result($result);
echo "</table>";
?>


<table>
  <tr>
    <th>Month</th>
    <th>Savings</th>
  </tr>
  <tr>
    <td>January</td>
    <td>$100</td>
  </tr>
  <tr>
    <td>February</td>
    <td>$80</td>
  </tr>
</table>