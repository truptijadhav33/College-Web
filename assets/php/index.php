<?php

$server = "localhost";
$usernameDB = "root";
$passwordDB = "@trupti33";
$database = "collegedb";

$username = $_POST['uname'];   //Accessing Username of user(student-login)  .
$password = $_POST['pass'];    //Accessing Password of user(student-login) .

// Creating a Connection with database ..
$conn = new mysqli($server,$usernameDB,$passwordDB,$database);
if($conn->connect_error)
{
    echo"Connection Error : ".$conn->connect_error;
}
// echo"Connection Successful !";

// ----------------------------------------------------
// #Creating a Database.
// Uncomment this if you are running this on new system !
// $sql = "CREATE DATABASE CollageDatabase";
//Creating a Database

// if($conn->query($sql))
// {
//     echo"<br>Database Created Successfully ! <br>";
// }
// else{
//     echo"Error while creating a database :".$conn->error;
// }
// ----------------------------------------------------
// ----------------------------------------------------
// # Creating a table for STUDENT_RECORD
// Uncomment if running on new system 
// $sql = "CREATE TABLE STUDENT_RECORD (
//   enrollment INT(10) PRIMARY KEY,
//   department VARCHAR(50), -- Increased size to accommodate longer department names
//   student_name VARCHAR(30),
//   tuition_fees INT
// )";
// if($conn->query($sql))
// {
//     echo"Table Created Successfully !";
// }
// else {
//     echo"Error while creating an table :".$conn->error;
// }
// ----------------------------------------------------
// ----------------------------------------------------
# Creating a table for login-details
// Uncomment if running on new system
// username is enrollment number
// $sql = "CREATE TABLE LOGIN_DETAILS (
//   username varchar(20) PRIMARY KEY,
//   password VARCHAR(20)
// )";
// if($conn->query($sql))
// {
//     echo"Table Created Successfully !";
// }
// else {
//     echo"Error while creating an table :".$conn->error;
// }
// ----------------------------------------------------
// ----------------------------------------------------
// Inserting Values !
// Uncomment to insert more data 
// $sql = "INSERT INTO STUDENT_RECORD (enrollment, department, student_name, tuition_fees) VALUES 
// (12345, 'CSE', 'Onkar sathe', 10000),
// (54321, 'ECE', 'Vrushali Sathe', 12000),
// (67890, 'MECH', 'Trupti Jadhav', 11500),
// (98765, 'EEE', 'David Jones', 9800),
// (87654, 'IT', 'Emily Brown', 8500);";

// if($conn->query($sql))
// {
//     echo"Value inserted Successfully !";
// }
// else{
//     echo"Unable to insert a values !";
// }
// ----------------------------------------------------
// ----------------------------------------------------
// Inserting Values into the student-login (From college records !)!
// Uncomment to insert more data 
// $sql = "INSERT INTO login_details (USERNAME,PASSWORD) VALUES 
// (12345,462801),
// (54321,54321),
// (67890,462803),
// (87654,462804),
// (98765,462804);";

// if($conn->multi_query($sql))
// {
//     echo"Value inserted Successfully !";
// }
// else{
//     echo"Unable to insert a values !".$conn->error;
// }
// // ----------------------------------------------------
// Database connection parameters

// Get the username from the POST parameters
if(isset($_POST['uname'])) 
{
    $input_username = $_POST['uname'];
    $input_password= $_POST['pass'];
    
    // Query to select all usernames from login_details table
    $sql = "SELECT USERNAME,PASSWORD FROM login_details";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // Loop through each row in the result set
        while($row = $result->fetch_assoc()) {

            // Compare each username with the input username

            if($row["USERNAME"] == $input_username && $row["PASSWORD"]==$input_password  ) 
            {
                // Fetch student data from student_record table if enrollment matches
                $enrollment = $row["USERNAME"]; // Assuming enrollment is the same as USERNAME
                $pass = $row["PASSWORD"];

                //selecting resulting when entered enrollment number and enrollment number in student_record is matched
                $student_sql = "SELECT * FROM student_record WHERE enrollment = '$enrollment'";

                $student_result = $conn->query($student_sql);

                if ($student_result->num_rows > 0)   
                {
                    //return values from table in key and value pair using fetch_assoc() i.e in the form of associative array

                    $student_data = $student_result->fetch_assoc();
            
                    foreach ($student_data as $key => $value) {
                        echo '<td>' . $value . '</td>';
                    }
                }

                else
                {
                    echo "No matching student record found.";
                }

                exit;
            }
          
    }
} 
    else 
    {
        echo "No usernames found in the database.";
    }
}
else 
{
    echo "Please provide a username in the URL parameter.";
}

// Close the database connection
$conn->close();


?>