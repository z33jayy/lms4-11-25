<?php
require("connection.php");

// Create the user_information table
$sql_user = "CREATE TABLE IF NOT EXISTS user_information (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    student_id INT DEFAULT NULL UNIQUE,
    teacher_id BIGINT DEFAULT NULL UNIQUE, 
    fullname VARCHAR(250) NOT NULL,
    address VARCHAR(250) NOT NULL,
    CellphoneNum BIGINT NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    Birthdate DATE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Student', 'Teacher') NOT NULL
)";
$query_user = mysqli_query($con, $sql_user);

// Create the classrooms table and reference user_information.teacher_id as foreign key
$sql_classroom= "CREATE TABLE classrooms ( 
    classroom_id INT PRIMARY KEY AUTO_INCREMENT,
    subject_name VARCHAR(255) NOT NULL,
    subject_code VARCHAR(50) NOT NULL,
    class_time VARCHAR(50) NOT NULL,
    teach_name VARCHAR(255) NOT NULL,
    instructor_id BIGINT NOT NULL,
    FOREIGN KEY (instructor_id) REFERENCES user_information(teacher_id)
)";


$query_classroom = mysqli_query($con, $sql_classroom);


?>
