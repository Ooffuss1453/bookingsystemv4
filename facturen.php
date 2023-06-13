<!DOCTYPE html>
<html>
<head>
  <title>Facturen</title>
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
    <h1>Facturen</h1>
    <div class="input-group mb-3">
        <input type="text" id="filterInput" class="form-control" placeholder="Filter facturen..." aria-label="Filter facturen..." aria-describedby="basic-addon2">
    <div class="input-group-append">
    <a class="btn btn-primary" href="dashboard.php">Terug</a>
  </div>
</div>
    <table class="table table-striped" id="itemTable">
      <thead>
        <tr>
          <th>Klantnummer</th>
          <th>Factuurnummer</th>
          <th>Orderdatum</th>
          <th>Subtotaal</th>
          <th>Verkoper</th>
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
          $sql = "SELECT id, klantnummer, factuurnummer, orderdatum, subtotaal, verkoper FROM facturen";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["klantnummer"] . "</td>";
              echo "<td>" . $row["factuurnummer"] . "</td>";
              echo "<td>" . $row["orderdatum"] . "</td>";
              echo "<td>" . $row["subtotaal"] . "</td>";
              echo "<td>" . $row["verkoper"] . "</td>";
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
