<?php
    include("DBconnection.php");

$q = intval($_GET['q']);

$sql="SELECT * FROM pizza WHERE id = '".$q."' ";
$result = mysqli_query($db,$sql);


echo "<table>
<tr>
<th>Pizza Name</th>
<th>Price</th>
<th>Quantity</th>
<th>Category</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>₹" . $row['price'] . "</td>";
    echo "<td>" . $row['quantity'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>