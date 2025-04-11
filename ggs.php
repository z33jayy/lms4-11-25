<?php
$filename = "tasks.txt";


// Save task
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_task"])) {
    $title = $_POST["title"];
    $deadline = $_POST["deadline"];
    
    $task = "$title|$deadline\n";
    file_put_contents($filename, $task, FILE_APPEND);
}

// Delete task
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_task"])) {
    $taskIndex = $_POST["delete_task"];
    $tasks = file($filename, FILE_IGNORE_NEW_LINES);
    unset($tasks[$taskIndex]);
    file_put_contents($filename, implode("\n", $tasks) . "\n");
}

// Load tasks
$tasks = [];
if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $parts = explode("|", $line);
        if (count($parts) == 2) {
            $tasks[] = [
                'title' => $parts[0],
                'deadline' => $parts[1]
            ];
        }
    }
}
session_start();
require("connection.php");

// 1. Validate session
if (!isset($_SESSION['teacher_id'])) {
    die("Teacher is not logged in.");
}

$teacher_id = intval($_SESSION['teacher_id']); // Convert to integer (safe for BIGINT)

// 2. Confirm the teacher exists in user_information
$check_teacher = mysqli_query($con, "SELECT * FROM user_information WHERE teacher_id = '$teacher_id' AND role = 'Teacher'");
if (mysqli_num_rows($check_teacher) == 0) {
    die("Invalid teacher account.");
}

// 3. Fetch classroom info
$sql = "
    SELECT 
        c.classroom_id, 
        c.subject_name, 
        c.subject_code, 
        c.class_time, 
        c.instructor_id, 
        u.fullname AS instructor_fullname, 
        u.email AS instructor_email
    FROM classrooms c
    INNER JOIN user_information u ON c.instructor_id = u.teacher_id
    WHERE c.instructor_id = '$teacher_id'
    ORDER BY c.classroom_id DESC
";

$result = mysqli_query($con, $sql);

// 4. Error check
if (!$result) {
    die("Query Error: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapEd LMS</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
        background-image: url('http://localhost/my_website/Photos/Capitol.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        min-height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
    }
    .jumbotron {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
    }
    #CULOGO {
        width: 50px;
        height: auto;
    }
    #navigationtext {
        font-size: 1.3rem;
        font-weight: bold;
        color: white;
        border-left: solid;
        border-right: solid;
        border-radius: 10px;
    }
    #navitem1:hover {
        transition: 0.3s;
        border-right: solid;
        border-top: solid;
        border-radius: 20px;
    }
    .classdes {
        background-color: lightgrey;
        padding: 2%;
        display: flex;
        border-radius: 20px;
        box-shadow: 5px 5px;
        margin-bottom: 5%;
        opacity: 85%;
        overflow: auto;
    }

    .table-section {
        background-color: rgba(255,255,255,0.95);
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0px 0px 10px #00000055;
        margin: 0 auto;
        width: 90%;
    }

    .dropdown .btn {
        background-color: #6c757d;
    }

    .modal-header {
        background-color: #0d6efd;
        color: white;
    }

    @media (min-width: 992px) {
        .navbar-collapse {
            display: flex !important;
            justify-content: center;
        }
        .navbar-nav {
            flex-direction: row;
        }
        .navbar-nav .nav-item {
            display: flex;
            align-items: center;
        }
        .navbar-nav .nav-link {
            display: flex;
            align-items: center;
        }
    }
        .btn {
            border: 3px solid black;
        }
        .task-container {
            background: rgba(255, 255, 255, 0.5);
            padding: 15px;
            border-radius: 10px;
            margin: 10px 0;
        }
        .task-list {
            margin-top: 20px;
        }
        .btn-secondary {
            background: rgba(108, 117, 125, 0.3);
            color: black;
            border: none;
        }
        .navbar .container-fluid {
            display: flex;
            justify-content: center;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

   <div class="jumbotron text-center text-white p-3" style="background-color: red;">
      <img src="http://localhost/my_website/Photos/CULOGO.png" alt="Logo" id="CULOGO">
      <h1 style="font-family: Oswald, serif; margin: 0;">CapEd Learning Management System</h1>
  </div>

  <nav class="navbar navbar-expand-lg" style="background-color: green;">
    <div class="container">
      <a class="navbar-brand" id="navigationtext">Navigation <i class="bi bi-compass"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item mx-3" id="navitem1">
            <a class="nav-link active" aria-current="page" href="Homepage.php" style="font-size: 1.3rem; font-weight: bold; color: white;">Home <i class="bi bi-house-door-fill"></i></a>
          </li>
          <li class="nav-item mx-3" id="navitem1">
            <a class="nav-link" href="try.php"style="font-size: 1.3rem; font-weight: bold; color: white;">Classroom <i class="bi bi-book-fill"></i></a>
          </li>
            <li class="nav-item mx-3" id="navitem1">
              <a class="nav-link active" aria-current="page" href="Tdash.php" style="font-size: 1.3rem; font-weight: bold; color: white;">Teacher's Dashboard <i class="bi bi-house-door-fill"></i></a>
            </li>
          <li class="nav-item dropdown mx-3" id="navitem1">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="font-size: 1.3rem; font-weight: bold; color: white;">
              Features 
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Notifications <i class="bi bi-bell-fill"></i></a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Activities/Quizzes <i class="bi bi-clipboard2-data-fill"></i></a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="ggs.php">Add Task<i class="bi bi-clipboard2-data-fill"></i></a></li>
             <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">LOG OUT</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <br>


    <div class="container mt-4">
        <form method="POST" class="mb-4">
            <input type="text" name="title" class="form-control mb-2" placeholder="Task Title" required>
            <input type="date" name="deadline" class="form-control mb-2" required>
            <button type="submit" name="add_task" class="btn btn-secondary" style="border: 2px solid black;">Add Task</button>
        </form>

        <div class="task-list">
            <?php foreach ($tasks as $index => $task): ?>
                <div class="task-container">
                    <h5><?php echo htmlspecialchars($task['title']); ?></h5>
                    <p>Deadline: <?php echo $task['deadline']; ?></p>
                    <!-- Finish button to delete task -->
                    <form method="POST" class="d-inline">
                        <input type="hidden" name="delete_task" value="<?php echo $index; ?>">
                        <button type="submit" class="btn btn-danger">Finish</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
