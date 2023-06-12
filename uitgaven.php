<!DOCTYPE html>
<html>
<head>
  <title>Uitgaven</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h1>Uitgaven</h1>
    <form method="POST" action="insert.php">
      <div class="form-group">
        <label for="item">Item:</label>
        <input type="text" class="form-control" id="item" name="item" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" id="description" name="description" required>
      </div>
      <div class="form-group">
        <label for="uitgaven_aantal">Uitgaven Aantal:</label>
        <input type="number" class="form-control" id="uitgaven_aantal" name="uitgaven_aantal" required>
      </div>
      <div class="form-group">
        <label for="datum">Datum:</label>
        <input type="date" class="form-control" id="datum" name="datum" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-primary" href="dashboard.php">Terug</a>
    </form>
</br>
    <table class="table table-striped" id="itemTable">
      <thead>
        <tr>
          <th>Items</th>
          <th>Description</th>
          <th>Uitgaven Aantal</th>
          <th>Datum</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Connect to the database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "test";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Fetch items from the database
          $sql = "SELECT id, item, description, uitgaven_aantal, datum FROM uitgaven";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["item"] . "</td>";
              echo "<td>" . $row["description"] . "</td>";
              echo "<td>" . $row["uitgaven_aantal"] . "</td>";
              echo "<td>" . $row["datum"] . "</td>";
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
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
