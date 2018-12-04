<?php
/*$query = "SELECT * FROM customers ORDER BY lastName";
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
mysqli_close($connection);
echo "</table>";
*/

    <form action="getpurchasedata.php" method="post">
    <?php
    $query = "SELECT customerId FROM customers ORDER BY lastName";
    $result = mysqli_query($connection,$query);
    if (!$result) {
         die("databases query failed.");
    }
    echo "<select name='mySelect'>";
    while   ( $query_array = mysql_fetch_array( $query_run ) ) {
        echo "<option value='".$query_array['customerId']."' >".$query_array['customerId']."</option>";                        
    }
    echo "</select>";
    mysqli_free_result($result);
    mysqli_close($connection);
    ?>
    <input type="submit" name="submit"/>
    </form>
?>