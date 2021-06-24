<?php
require_once 'conn.php';
$sql = "SELECT Value FROM controller where Name = 'Motor5' ";
$result = mysqli_query($dbc,$sql);

  while($row = $result->fetch_assoc()) {
    if ($result->num_rows >0) {
        $Value = $row["Value"];

        // Output a row
        echo 'value="'.$Value.'"';
    } else {
        echo "0";
    }
    }
?>