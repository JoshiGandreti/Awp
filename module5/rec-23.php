<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $errors = array();
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }
    if (empty($phone)) {
        $errors[] = 'Phone number is required';
    }

    if (empty($errors)) {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'test';
        $conn = mysqli_connect($host, $user, $password, $database);
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        $sql = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')";
        if (mysqli_query($conn, $sql)) {
            echo 'Student information saved successfully';
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
    <br>
    <label>Email:</label>
    <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
    <br>
    <label>Phone number:</label>
    <input type="text" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
