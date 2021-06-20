<?php
require "conn.php";
if (isset($_POST['power'])) {
    $query = "UPDATE controller SET Value = 0 WHERE ID = 0";
    if ($_POST['power'] == "ON") {
        $query = "UPDATE controller SET Value = 1 WHERE ID = 0";
    }
    if (mysqli_query($dbc, $query)) {
        echo "Power is ".$_POST['power'];
    } else {
        echo "Error: " . mysqli_error($dbc);
    }

    mysqli_close($dbc);
};
?>
