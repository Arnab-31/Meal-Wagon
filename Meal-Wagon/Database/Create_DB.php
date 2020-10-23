<?php
$servername = "localhost";
$username = "root";
$password = "shresth";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE MealWagon";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully" . "<br>";
} else {
  echo "Error creating database: " . $conn->error . "<br>";
}

// Selecting the database
$db=mysqli_select_db($conn,'MealWagon');
  if (!$db)
        echo "Database not selected" . "<br>";
    else
        echo "Database SELECTED" . "<br>";


// sql to create table user
$sql = "CREATE TABLE user (
  Name                     VARCHAR(30) PRIMARY KEY,
  Password                 VARCHAR(30),
  Email                    VARCHAR(30),
  Weight                   INT,
  Gender                   VARCHAR(10) check(Gender in ('Male','Female','Other')),
  Height_ft                INT,
  Height_in                INT,
  Goal                     VARCHAR(15) check(Goal in ('Lose','Maintain','Gain')),
  Activity_Factor          INT,
  Dailiy_Calorie_Target    INT,
  Daily_Protein_Target     INT,
  Daily_Carb_Target        INT,
  Daily_Fat_Target         INT,
  Daily_Water_Intake       INT,  
  Cuisine                  VARCHAR(30)
)";
  
if ($conn->query($sql) === TRUE) {
  echo "user table created successfully" . "<br>";
} else {
  echo "Error creating user table: " . $conn->error . "<br>";
}

// sql to create intolerances table  
$sql = "CREATE TABLE intolerance (
  Name                   VARCHAR(10) primary key,
  Name_int                     VARCHAR(30)
)";
  
if ($conn->query($sql) === TRUE) {
  echo "intolerance table created successfully" . "<br>";
} else {
  echo "Error creating intolerance table: " . $conn->error . "<br>";
}

// sql to create meal_plan table
$sql = "CREATE TABLE  meal_plan (
  planId             VARCHAR(10) primary key,
  Name             VARCHAR(10),
  Date               DATE,
  Calories_Consumed  INT,
  Protein_Consumed   INT,
  Fat_Consumed       INT,
  Carb_Consumed      INT,
  Water_Intake       INT,
  FOREIGN KEY (Name) REFERENCES user(Name)
)";
  
if ($conn->query($sql) === TRUE) {
  echo "meal_plan table created successfully" . "<br>";
} else {
  echo "Error creating meal_plan table: " . $conn->error . "<br>";
}

// sql to create meal table
$sql = "CREATE TABLE  meal (
  mealId          VARCHAR(10) primary key,
  planId          VARCHAR(10),
  isConsumed      INT check(isConsumed in (0,1)),
  name            VARCHAR(30),
  type            VARCHAR(20) check(type in ('Breakfast','Lunch','Dinner')),  
  prep_time       INT,
  servings        INT,
  calories        INT,
  protein         INT,
  fat             INT,
  saturated_fat   INT,
  carb            INT,
  sugar           INT,
  sodium          INT,
  FOREIGN KEY (planId) REFERENCES meal_plan(planId) 
)";
  
if ($conn->query($sql) === TRUE) {
  echo "meal table created successfully " . "<br>";
} else {
  echo "Error creating meal table: " . $conn->error . "<br>";
}

$conn->close();
?>