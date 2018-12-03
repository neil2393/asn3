<?php
$query = "SELECT * FROM customers ORDER BY lastName";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["firstName"] . "</th><td>" . $row["lastName"] . "</th><td>" . $row["city"] . "</th><td>" . $row["phoneNumber"] . "</th><td>" . $row["customerId"] . "</th><td>" . $row["agentId"] . "</td>";
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