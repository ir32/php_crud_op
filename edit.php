<?php

    include('conn.php');
    $id = $_GET['id'];

    $sql = "SELECT * FROM food WHERE id = $id";
    $result = $conn->query($sql);
    $fetchedData = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <form class="form-inline" action="update_final.php" method="POST">
    <?php
    foreach ($fetchedData as $row) {
    ?>
    <input type="hidden"  name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
    </div>
    <br>
    <div class="form-group">
      <label for="body">Body:</label>
      <input type="text" class="form-control" id="body" name="body" value="<?php echo $row['body']; ?>">
    </div>
    <?php
     } ?>
    <br>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
