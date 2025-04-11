<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CapEd Learning Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
body {
      background-image: url('http://localhost/my_website/Photos/COC.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    .form-container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background-color: white;
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
        #navigationtext{
          font-size: 1.3rem; 
          font-weight: bold; 
          color: white;
          border-left: solid;
          border-right: solid;
          border-radius:10px;
        }
        #navitem1:hover{
          transition: 0.3s;
          border-right: solid;
          border-top: solid;
          border-radius: 20px;
        }
        #container1 {
          border: solid;
          border-radius: 20px;
          max-width: 50vw;
          height: auto;
          background-color: lightgrey;
          opacity: 80%;
          margin: auto;
          text-align: center;
          max-height: 500px; /* Limit height */
          overflow-y: auto;
          padding: 10px;
        }  



    .card {
      background-color: rgba(255, 255, 255, 0.9);
    }
    .progress-label {
      font-size: 0.9rem;
      margin-top: 0.2rem;
    }
  </style>
</head>
<body>

  <div class="jumbotron text-center text-white p-3" style="background-color: red;">
    <img src="http://localhost/my_website/Photos/CULOGO.png" alt="Logo" id="CULOGO">
    <h1 style="font-family: Oswald, serif; margin: 0;">CapEd Learning Management System</h1>
  </div>

<!-- Navbar -->

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
            <li><a class="dropdown-item" href="#">Acitvities/Quizzes <i class="bi bi-clipboard2-data-fill"></i></a></li>
            <li><hr class="dropdown-divider"></li>
             <li><a class="dropdown-item" href="ggs.php">Add Task<i class="bi bi-clipboard2-data-fill"></i></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">LOG OUT</a>
            </li>
                </ul>
                  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  Are you sure you want to log out?
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <a href="logout.php" class="btn btn-danger">Yes, Logout</a>
                              </div>
                          </div>
                      </div>
                  </div>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<br>





<div class="container py-4">
  <div class="card p-4 mb-4">
    <h3 class="text-center">Welcome, Teacher!</h3>

    <div class="my-4">
  <div class="d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Courses</h5>
    <button class="btn btn-sm btn-outline-secondary">Edit</button>
  </div>
  <ul class="list-group list-group-flush mt-2">
    <li class="list-group-item" style="background-color: transparent;">IT 1 - Computer Programming II</li>
    <li class="list-group-item" style="background-color: transparent;">IT 2 - IT Elective I</li>
    <li class="list-group-item" style="background-color: transparent;">IT 3 - Human Computer Interaction</li>
    <li class="list-group-item" style="background-color: transparent;">IT 8 - IT Project II</li>
  </ul>


</div>


    <div class="my-4">
      <h5>Course Progress</h5>
      <div class="mb-2">
        <div class="progress" style="background-color: darkgrey;">
          <div class="progress-bar bg-success" style="width: 57%">IT 8 (57%)</div>
        </div>
      </div>
      <div class="mb-2">
        <div class="progress" style="background-color: darkgrey;">
          <div class="progress-bar bg-danger" style="width: 37%">IT 3 (37%)</div>
        </div>
      </div>
      <div class="mb-2">
        <div class="progress" style="background-color: darkgrey;">
          <div class="progress-bar bg-primary" style="width: 26%">IT 2 (26%)</div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card p-3 mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <h5>Upcoming Deadlines</h5>
            <button class="btn btn-sm btn-outline-secondary">Edit</button>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
              <span>IT 1 (Activity 2)</span><span>March 25, 2025</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>IT 2 (WBS)</span><span>March 22, 2025</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>IT 3 (Mock-Up Design)</span><span>March 21, 2025</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>IT 8 (Powerpoint)</span><span>April 3, 2025</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card p-3 mb-3">
          <div class="d-flex justify-content-between align-items-center">
            <h5>Notifications</h5>
            <button class="btn btn-sm btn-outline-secondary">Edit</button>
          </div>
          <ul class="list-unstyled mt-2">
            <li>• Reminder: IT 3 (Mock-Up Design) Due Today, 11:59</li>
            <li>• 21 people have submitted (IT 3 - Mock-Up Design)</li>
            <li>• Reminder: IT 2 (WBS) Due Tomorrow, 11:59</li>
            <li>• 3 people missed IT 1 (Activity 1)</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>