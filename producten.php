<!DOCTYPE html>
<html>
<head>
  <title>Producten</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#filterInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#itemTable tr').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });
    });
  </script>
  <style>
    .container {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Producten</h1>
    <div class="input-group mb-3">
        <input type="text" id="filterInput" class="form-control" placeholder="Filter facturen..." aria-label="Filter producten..." aria-describedby="basic-addon2">
    <div class="input-group-append">
    <a class="btn btn-primary" href="dashboard.php">Terug</a>
  </div>
</div>
    <table class="table table-striped" id="itemTable">
      <thead>
        <tr>
          <th>Producten</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Connect to the database
          $servername = "boekhoudsysteem.mysql.database.azure.com";
          $username = "sekariya";
          $password = "Prullenbak123";
          $dbname = "db_boekhoud";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Fetch items from the database
          $sql = "SELECT id, item, description FROM producten";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["item"] . "</td>";
              echo "<td>" . $row["description"] . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='5'>No items found</td></tr>";
          }

          $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
