<?php 
session_start();
require("connection.php");

if (isset($_POST['register'])) {
    $fullname = $_POST['name'];
    $role = $_POST['role'];
    $address = $_POST['address'];
    $CellphoneNum = $_POST['CellphoneNum'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $Birthdate = $_POST['Birthdate'];

    
    if ($role == 'Student') {
    $year = date("y"); // Get last two digits of the year (e.g., 25 for 2025)
    $randomNum = rand(1000, 9999); // Generate 3 random digits for students
    $student_id = intval($year . $randomNum); // Combine the year and random number
} else {
    $year = date("y"); // Get last two digits of the year (e.g., 25 for 2025)
    $randomNum = rand(100, 999); // Generate 4 random digits for teachers
    $teacher_id = intval($year . $randomNum); // Combine the year and random number
}

    // Insert into database
    if ($role == 'Student') {
        $sql = "INSERT INTO user_information (fullname, role, address, CellphoneNum, email, password, gender, Birthdate, student_id) 
                VALUES ('$fullname', '$role', '$address', '$CellphoneNum', '$email', '$password', '$gender', '$Birthdate', '$student_id')";
    } else {
        $sql = "INSERT INTO user_information (fullname, role, address, CellphoneNum, email, password, gender, Birthdate,teacher_id) 
                VALUES ('$fullname', '$role', '$address', '$CellphoneNum', '$email', '$password', '$gender', '$Birthdate','$teacher_id')";
    }

    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: login.php");
    } else {
        header("Location: register.php");
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style type="text/css">
        body {
            background-image: url('http://localhost/my_website/Photos/Friendship.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(90%);
            margin: 0;
        }

        .jumbotron {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            background-color: red;
            padding: 1rem;
            color: white;
        }

        .jumbotron img {
            width: 50px;
            height: auto;
        }

        .form-container {
            max-height: 600px;
            overflow-y: auto;
            padding: 25px;
            max-width: 480px;
            margin: 30px auto;
            background-color: white;
            opacity: 95%;
        }

    </style>
</head>
<body class="bg-light">
    <div class="jumbotron text-center">
        <img src="http://localhost/my_website/Photos/CULOGO.png" alt="Logo">
        <h1 style="font-family: Oswald, serif; margin: 0;">CapEd Learning Management System</h1>
    </div>

    <div class="container">
        <div class="form-wrapper">
            <form class="form-container" method="POST" action="">
                <h4 class="text-center mb-4">Register</h4>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-control" id="role" required>
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter your Address" required>
                </div>

                <div class="mb-3">
                    <label for="CellphoneNum" class="form-label">Cellphone Number</label>
                    <input type="text" class="form-control" id="CellphoneNum" name="CellphoneNum" placeholder="Enter your Cellphone Number" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" class="form-control" id="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Birthdate" class="form-label">Birthdate</label>
                    <input type="date" class="form-control" id="Birthdate" name="Birthdate" required>
                </div>

                <button type="submit" class="btn btn-primary w-100" name="register">Register</button>

                <div class="ICONS d-flex justify-content-center mt-3">
                    <a href="login.php"><i class="bi bi-box-arrow-left mx-2" style="font-size: 2rem;" title="Go Back"></i></a>
                    <i class="bi bi-facebook mx-2" style="font-size: 2rem;" title="Facebook Page"></i>
                    <i class="bi bi-envelope-at-fill mx-2" style="font-size: 2rem;" title="Email Us"></i>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
