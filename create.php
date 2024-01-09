<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $body = $_POST['body'];

    // Image handling
    $targetDir = "uploads/"; // Directory where images will be stored
    $targetFile = $targetDir . basename($_FILES["image"]["name"]); // Get the file name

    // Check if file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Upload the file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert into the database
            $sql = "INSERT INTO food (name, body, image) VALUES ('$name', '$body', '$targetFile')";
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
                echo "New record inserted successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Insert Data</h2>
    <form action="" method="POST" enctype="multipart/form-data" novalidate>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div class="error-message" id="name-error"></div>
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <input type="text" class="form-control" id="body" name="body" required>
            <div class="error-message" id="body-error"></div>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image" required accept="image/*">
            <div class="error-message" id="image-error"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function (e) {
        var nameField = document.getElementById('name');
        var bodyField = document.getElementById('body');
        var nameError = document.getElementById('name-error');
        var bodyError = document.getElementById('body-error');
        var isValid = true;

        if (!nameField.checkValidity()) {
            nameError.textContent = 'This field is required';
            isValid = false;
        } else {
            nameError.textContent = '';
        }

        if (!bodyField.checkValidity()) {
            bodyError.textContent = 'This field is required';
            isValid = false;
        } else {
            bodyError.textContent = '';
        }

        if (!isValid) {
            e.preventDefault();
        }
    });

    document.querySelectorAll('input').forEach(function (input) {
        input.addEventListener('input', function () {
            var errorDiv = input.nextElementSibling;
            if (input.checkValidity()) {
                errorDiv.textContent = '';
            }
        });
    });
</script>

</body>
</html>
