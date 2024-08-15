<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Student Details</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    display: flex;
  align-items: center;
  justify-content: center;
    font-size: 17px;
    background-color: #f2f2f2;
    margin:150px auto
}
.container{
    background-color: white;
    width: 600px;
    padding: 25px;
    border-bottom: 7px solid #068FFF;
    box-shadow: 0 0 7px rgba(0,0,0,0.5);
    border-radius:5px
}

h3 {
    text-align: center;
    font-size: 32px;
    font-family: "Raleway", sans-serif;
    font-weight: 400;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.data-table th, .data-table td {
    padding: 8px;
    text-align: left;
    font-size: 20px;
}

.data-table th {
    background-color: #068FFF;
    color:#ffffff;
}
.data-table tbody tr{
    background-color:#f2f2f2;
}
</style>
<body>
    <div class="container">
        <h3>Student Details</h3>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Enrollment</th>
                    <th>Department</th>
                    <th>Student Name</th>
                    <th>Fees</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <?php
                   include "index.php"; 
                   ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>