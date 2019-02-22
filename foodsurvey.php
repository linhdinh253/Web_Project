<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sii";

$conn = new mysqli($servername , $username , $password , $dbname);

if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
    
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $sql= "SELECT dept_id,dept_name from department";
      $stmt = $conn->prepare("INSERT INTO foodsurvey(outside, meal, national, type, age, email) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssss", $outside, $meal, $national, $type, $age, $email);

      $outside = $_POST['outside'];
      $meal = $_POST['meal']; 
      $national = $_POST['national'];
      $type = $_POST['type'];
      $age = $_POST['age'];
      $email = $_POST['email'];

      $result = $conn->query($sql);
      $stmt->execute();
   }

?>

<!DOCTYPE html>
<html>
<head>
   <title>food survey</title>

</head>
<body>
  <h1>food survey</h1>

  <form method="post">
 How often do you eat out a lot?:<br>
    <select name="outside">
        <option value="Always">Always</option>
        <option value="Occasionally">Occasionally</option>
        <option value="Rarely">Rarely</option>
    </select><br>

 What meal do you usually eat out?:<br>
    <select name="meal">
        <option value="Breakfast">Breakfast</option>
        <option value="Lunch">Lunch</option>
        <option value="Dinner">Dinner</option>
    </select><br>

  What kind of food do you like?:<br>
    <select name="national">
        <option value="Thai">Thai</option>
        <option value="Chinese">Chinese</option>
        <option value="Japanaes">Japanaes</option>
        <option value="Western">Western</option>
        <option value="Korean">Korean</option>
        <option value="Others">Others</option>
    </select><br>

 What kind of restuarant do you go to?:<br>
    <select name="type">
        <option value="Buffet">Buffet</option>
        <option value="Main course / One dish">Main course / One dish</option>
        <option value="Fast food">Fast food</option>
        <option value="Dessert">Dessert</option>
    </select><br>

  Age:<br>
  <input type="text" name="age" >
  <br>

  Email:<br>
  <input type="text" name="email" >
  <br>

  <input type="submit" value="Submit">
  <br> 
</form> 

</body>
</html>