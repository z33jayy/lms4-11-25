<?php
// Ensure this is at the top of your PHP code
require("connection.php");

$sql = "SELECT * FROM classrooms ORDER BY classroom_id DESC";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($con));  // Debugging error
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Classroom</title>
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
            <a class="nav-link" href="#"style="font-size: 1.3rem; font-weight: bold; color: white;">Classroom <i class="bi bi-book-fill"></i></a>
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



  <!-- Classroom List -->
  <div class="container">
    <div class="row">
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="col-sm-6 col-lg-4 col-md-6">';
          echo '<div class="classdes">';
          echo '<img src="http://localhost/my_website/Photos/ICON.jpg" class="img-fluid" style="border-radius: 100%; max-width: 120px; height: 120px;">';
          echo '<div style="margin-left: 3%;">';
          echo '<h5>Subject: ' . $row['subject_name'] . '</h5>';
          echo '<p style="margin: 0px;">Section Code: ' . $row['subject_code'] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo "<p class='text-center'>No classrooms found.</p>";
      }
      ?>
    </div>
  </div>

  <!-- Classroom Table -->
  <div class="container table-section">
    <h3 class="text-center mb-4">Classroom List</h3>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Subject Name</th>
            <th>Subject Code</th>
            <th>Class Time</th>
            <th>Instructor Name</th>
            <th>Instructor Email</th>
            <th>Instructor ID</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require("connection.php");
          $sql = "SELECT * FROM classrooms ORDER BY classroom_id DESC";
          $result = mysqli_query($con, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['classroom_id'] . "</td>";
              echo "<td>" . $row['subject_name'] . "</td>";
              echo "<td>" . $row['subject_code'] . "</td>";
              echo "<td>" . $row['class_time'] . "</td>";
              echo "<td>" . $row['instructor_name'] . "</td>";
              echo "<td>" . $row['instructor_email'] . "</td>";
              echo "<td>" . $row['instructor_ID'] . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='7' class='text-center'>No classrooms found.</td></tr>";
          }
          mysqli_close($con);
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
