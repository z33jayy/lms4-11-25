<?php
session_start();
require("connection.php");
$error = ""; 

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    // Prepare a SQL query to find the user by email
    $sql = "SELECT * FROM user_information WHERE email='$email'";
    $query = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($query);

    // Check if user exists and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Redirect based on the user role
        if ($user['role'] == 'Teacher') {
            header("Location: Homepage2.php"); // Redirect to teacher's homepage
            $_SESSION['teacher_id'] = $user['teacher_id'];
        } else {
            $_SESSION['teacher_id'] = $user['student_id'];
            header("Location: Homepage.php"); // Redirect to student's homepage
        }
        exit();
    } else {
        // If login fails, show error message
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <div class="jumbotron text-center text-white p-3" style="background-color: red;">
        <img src="http://localhost/my_website/Photos/CULOGO.png" alt="Logo">
        <h1 style="font-family: Oswald, serif; margin: 0;">CapEd Learning Management System</h1>
    </div>
    <br><br><br><br>
    <div class="container justify-content-center">
        <form class="form-container" method="post">
            <h4 class="text-center">Login</h4>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email" value="">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
            </div>
            
            <?php if ($error){ ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php } ?>
            
            <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
            
            <div class="ICONS d-flex justify-content-center mt-3">
                <label for="reg" style="font-size: 1rem;">Don't Have an Account? </label>
                <a href="register.php" name="reg">Register</a>
            </div>
            <div class="ICONS d-flex justify-content-center mt-3">
                <i class="bi bi-facebook mx-2" style="font-size: 2rem;" title="Facebook Page"></i>
                <i class="bi bi-envelope-at-fill mx-2" style="font-size: 2rem;" title="Email Us"></i>
            </div>
        </form>    
    </div>
</body>
</html>
