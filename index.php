<?php
require "conn.php";

$isPower = "";
$isDisabled = "disabled";
$isLabel = "OFF";
$query = "SELECT * FROM controller WHERE ID = 0";
$result = mysqli_query($dbc, $query);

if (mysqli_fetch_assoc($result)["Value"] == 1) {
  $isPower = "checked";
  $isDisabled = "";
  $isLabel = "ON";
};

$query = "SELECT * FROM basedirection WHERE ID = 1";
$result = mysqli_fetch_assoc(mysqli_query($dbc, $query));
$activeClassId = $result['direction'];

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <link rel="stylesheet" href="styles.css">

  <title>Robotic arm</title>
</head>

<body>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <nav class="navbar navbar-light bg-light">
    <div class="container">
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheck1" name="flexSwitchCheck1" <?php echo $isPower; ?>>
        <label class="form-check-label" for="flexSwitchCheck1" id="flexSwitchCheck1Label"><?php echo $isLabel; ?></label>
      </div>
      <script>
        $('#flexSwitchCheck1').click(function() {
          if ($(this).prop("checked") == true) {
            $('#flexSwitchCheck1Label').text("ON");
            $("#angles :input").prop("disabled", false);
            $(".controls").prop("disabled", false);
            $.ajax({
              type: "POST",
              url: "power.php", //your url here
              data: {
                'power': 'ON'
              },
              dataType: 'json',
              error: function(response) {
                console.log(response);
              }
            });

          } else if ($(this).prop("checked") == false) {
            $('#flexSwitchCheck1Label').text("OFF");
            $("#angles :input").prop("disabled", true);
            $(".controls").prop("disabled", true);
            $.ajax({
              type: "POST",
              url: "power.php", //your url here
              data: {
                'power': 'OFF'
              },
              dataType: 'json',
              error: function(response) {
                console.log(response);
              }
            });
          }
        });
      </script>
      <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#settingModal">
        <i class="bi bi-gear-wide-connected"></i>
      </button>
      <!-- Modal -->
      <div class="modal fade" id="settingModal" tabindex="-1" aria-labelledby="settingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-sm-down">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="settingModalLabel">Settings</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="d-flex flex-md-row flex-column align-items-start">
                <div class="nav flex-column nav-pills me-3 setting" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <button class="nav-link m-1 active" id="v-pills-General-tab" data-bs-toggle="pill" data-bs-target="#v-pills-General" type="button" role="tab" aria-controls="v-pills-General" aria-selected="true">General</button>
                  <button class="nav-link m-1" id="v-pills-WebSocket-tab" data-bs-toggle="pill" data-bs-target="#v-pills-WebSocket" type="button" role="tab" aria-controls="v-pills-WebSocket" aria-selected="false">WebSocket</button>
                  <button class="nav-link m-1" id="v-pills-Theme-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Theme" type="button" role="tab" aria-controls="v-pills-Theme" aria-selected="false">Theme</button>
                </div>
                <div class="setting-div"></div>
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-General" role="tabpanel" aria-labelledby="v-pills-General-tab">
                    General settings for the controller.
                  </div>
                  <div class="tab-pane fade" id="v-pills-WebSocket" role="tabpanel" aria-labelledby="v-pills-WebSocket-tab">
                    WebSocket settings.
                  </div>
                  <div class="tab-pane fade" id="v-pills-Theme" role="tabpanel" aria-labelledby="v-pills-Theme-tab">
                    Theme settings.
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-dark">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="container-lg my-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
      <div class="col">
        <div class="card my-2" style="height: 28rem;">
          <div class="card-body d-flex flex-column justify-content-center">
            <div class="mx-auto my-5">
              <div id="status" class="status d-flex justify-content-center align-items-center">Disconnected</div>
            </div>
            <div class="mx-auto">
              <form action="#">
                <div class="input-group mb-3" style="width: 14rem;">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-globe2"></i></span>
                  <input type="text" class="form-control" placeholder="WebSocket" aria-describedby="basic-addon1">
                </div>
                <button id="connectButton" type="button" class="btn btn-outline-success" style="width: 14rem;">Connect</button>
                <button id="disconnectButton" type="button" class="btn btn-outline-danger" style="width: 14rem; display:none">Disconnect</button>
              </form>
            </div>
            <script>
              $('#connectButton').click(function() {
                $('#status').addClass("connected");
                $('#status').text("Connected");
                $('#connectButton').hide();
                $('#disconnectButton').show();
              });
              $('#disconnectButton').click(function() {
                $('#status').removeClass("connected");
                $('#status').text("Disconnected");
                $('#disconnectButton').hide();
                $('#connectButton').show();
              });
            </script>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card my-2" style="height: 28rem;">
          <div class="card-body">
            <form id="angles" action="php_sql/setMotorValues.php" method="POST">
              <label for="Motor1Range" class="form-label">Motor 1</label>
              <input type="range" class="form-range" min="0" max="180" step="5" id="Motor1Range" name="Motor1" data-bs-toggle="tooltip" data-bs-placement="top" title="" <?php $name="Motor1"; include 'php_sql/getMotor.php'; ?> <?php echo $isDisabled; ?>>
              <label for="Motor2Range" class="form-label">Motor 2</label>
              <input type="range" class="form-range" min="0" max="180" step="5" id="Motor2Range" name="Motor2" data-bs-toggle="tooltip" data-bs-placement="top" title="" <?php $name="Motor2"; include 'php_sql/getMotor.php'; ?> <?php echo $isDisabled; ?>>
              <label for="Motor3Range" class="form-label">Motor 3</label>
              <input type="range" class="form-range" min="0" max="180" step="5" id="Motor3Range" name="Motor3" data-bs-toggle="tooltip" data-bs-placement="top" title="" <?php $name="Motor3"; include 'php_sql/getMotor.php'; ?> <?php echo $isDisabled; ?>>
              <label for="Motor4Range" class="form-label">Motor 4</label>
              <input type="range" class="form-range" min="0" max="180" step="5" id="Motor4Range" name="Motor4" data-bs-toggle="tooltip" data-bs-placement="top" title="" <?php $name="Motor4"; include 'php_sql/getMotor.php'; ?> <?php echo $isDisabled; ?>>
              <label for="Motor5Range" class="form-label">Motor 5</label>
              <input type="range" class="form-range" min="0" max="180" step="5" id="Motor5Range" name="Motor5" data-bs-toggle="tooltip" data-bs-placement="top" title="" <?php $name="Motor5"; include 'php_sql/getMotor.php'; ?> <?php echo $isDisabled; ?>>
              <label for="Motor6Range" class="form-label">Motor 6</label>
              <input type="range" class="form-range" min="0" max="180" step="5" id="Motor6Range" name="Motor6" data-bs-toggle="tooltip" data-bs-placement="top" title="" <?php $name="Motor6"; include 'php_sql/getMotor.php'; ?> <?php echo $isDisabled; ?>>
              <button type="submit" name="submit" class="btn btn-dark" <?php echo $isDisabled; ?>>Submit</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card my-2" style="height: 28rem;">
          <div class="card-body d-flex justify-content-center">
            <div class="align-self-center">
              <table>
                <tr>
                  <td>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-dark controls" id="forward" onclick="myFunction(this.id)" <?php echo $isDisabled; ?>>
                      <i class="bi bi-chevron-up"></i>
                    </button>
                  </td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button type="button" class="btn btn-outline-dark controls" id="left" onclick="myFunction(this.id)" <?php echo $isDisabled; ?>>
                      <i class="bi bi-arrow-counterclockwise"></i>
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-dark controls" id="stop" onclick="myFunction(this.id)" <?php echo $isDisabled; ?>>
                      <i class="bi bi-stop-circle-fill"></i>
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-dark controls" id="right" onclick="myFunction(this.id)" <?php echo $isDisabled; ?>>
                      <i class="bi bi-arrow-clockwise"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-dark controls" id="backward" onclick="myFunction(this.id)" <?php echo $isDisabled; ?>>
                      <i class="bi bi-chevron-down"></i>
                    </button>
                  </td>
                  <td>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script>
    $("#<?php echo $activeClassId ?>").addClass("activeClass");
    function myFunction(id) {
      var direction = id;
      $(".activeClass").removeClass("activeClass");
      $("#"+id).addClass("activeClass");
      $.ajax({
        url: "php_sql/updateMovement.php",
        method: "POST",
        data: {
          direction: direction
        },
      });
    };
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script>
    $('input', '#angles').each(function () {
      $(this).prop('title', $(this).val());
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
    })
    
    $(document).ready(function() {
      $("#angles").children('input').on('input', function() { 
        $(this).prop('title', $(this).val());
        $(this).tooltip().attr('data-bs-original-title', $(this).val()).tooltip('show');
      });
    });
  </script>
</body>

</html>