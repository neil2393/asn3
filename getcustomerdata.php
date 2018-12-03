<?php
$query = "SELECT * FROM customers ORDER BY lastName";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<ol>";
    echo $row["firstName"] . " " . $row["lastName"] . " " . $row["city"] . " " . $row["phoneNumber"] . " " . $row["customerId"] . " " . $row["agentId"] . "</ol>";
}
mysqli_free_result($result);
echo "</ol>";
?>
