<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['username'];
// echo ("<pre>"); print_r($user_id);
include('conn.php');
$sql = "SELECT * FROM food";
$result = $conn->query($sql);
$fetchedData = mysqli_fetch_all($result, MYSQLI_ASSOC);
$count = 1;
//http://localhost/php_crud_op/login.php
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Table</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2>Food Records</h2> 
    <a href="logout.php" class="btn btn-danger float-end">Logout</a>
    <a href="create.php" class="btn btn-primary float-end mr-2">Create</a>

    <table id="foodTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fetchedData as $row) { ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['name']; ?></td> 
                    <td><?php echo $row['body']; ?></td> 
                    <td><img src="<?php echo $row['image']; ?>" alt="Image" style="width:100px;height:100px;"></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> Edit </a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> Delete </a>
                    </td>            
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#foodTable').DataTable();
    });
</script>

</body>
</html>
