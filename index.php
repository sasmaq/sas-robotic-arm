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
            <form action="#">
              <label for="Motor1Range" class="form-label">Motor 1</label>
              <input type="range" class="form-range" min="0" max="360" step="5" id="Motor1Range">
              <label for="Motor2Range" class="form-label">Motor 2</label>
              <input type="range" class="form-range" min="0" max="360" step="5" id="Motor2Range">
              <label for="Motor3Range" class="form-label">Motor 3</label>
              <input type="range" class="form-range" min="0" max="360" step="5" id="Motor3Range">
              <label for="Motor4Range" class="form-label">Motor 4</label>
              <input type="range" class="form-range" min="0" max="360" step="5" id="Motor4Range">
              <label for="Motor5Range" class="form-label">Motor 5</label>
              <input type="range" class="form-range" min="0" max="360" step="5" id="Motor5Range">
              <label for="Motor6Range" class="form-label">Motor 6</label>
              <input type="range" class="form-range" min="0" max="360" step="5" id="Motor6Range">
              <button type="submit" class="btn btn-dark">Submit</button>
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
                    <button type="button" class="btn btn-outline-dark controls">
                      <i class="bi bi-chevron-up"></i>
                    </button>
                  </td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>
                    <button type="button" class="btn btn-outline-dark controls">
                      <i class="bi bi-arrow-counterclockwise"></i>
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-dark controls">
                      <i class="bi bi-stop-circle-fill"></i>
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-dark controls">
                      <i class="bi bi-arrow-clockwise"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                  </td>
                  <td>
                    <button type="button" class="btn btn-outline-dark controls">
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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>