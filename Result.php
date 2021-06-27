<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Results</title>
</head>

<?php
include_once 'conn.php';
$result = mysqli_query($dbc, 'SELECT Value,Name FROM controller');
?>

<body>

  <!-- <table>
                <//?php while($row = mysqli_fetch_assoc($result)){ ?>
                  <tr>
                    <td>
                      <label class="form-label"><//?php echo"{$row['Name']}"?></label>
                      <label class="form-label"><//?php echo"{$row['Value']}"?></label>
                    </td>
                  </tr>
                <//?php } ?>
              </table>-->

  <table>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>" . $row['Name'] . " " . $row['Value'] . "</td></tr>";
    };
    ?>
  </table>
</body>

</html>