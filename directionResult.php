<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Direction Results</title>
</head>

<?php
include_once 'conn.php';
$result = mysqli_query($dbc, 'SELECT direction FROM basedirection');
?>

<body>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<a>" . $row['direction'] . "</a>";
    };
    ?>
</body>

</html>