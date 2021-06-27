<?php
require '../conn.php';
    if (isset($_POST["direction"])) {
        $direction = $_POST['direction'];
        $query = "UPDATE basedirection SET direction='$direction' WHERE id = 1;";
        mysqli_query($dbc, $query);
    };

?>