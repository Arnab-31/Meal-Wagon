<?php
// create & initialize a curl session
//$curl = curl_init();

// set our url with curl_setopt()
//curl_setopt($curl, CURLOPT_URL, "https://api.spoonacular.com/recipes/complexSearch?query=paneer&apiKey=9d29dd77f35b4d199ea2925104bb46d8");


// return the transfer as a string, also with setopt()
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// curl_exec() executes the started curl session
// $output contains the output string
//$output = curl_exec($curl);
//echo $output;

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
//curl_close($curl);
?> 

<!-- <?php
    // if(!empty($_GET['search'])){
    //     $search = $_GET['search'];
    //     $meals_url = 'https://api.spoonacular.com/recipes/complexSearch?query=' . $search . '&apiKey=9d29dd77f35b4d199ea2925104bb46d8';
    //     $meals_json = file_get_contents($meals_url);
    //     $meals_array = json_decode($meals_json, true);

    //     $meals_calorie=array();
    //     $meals_summary=array();

    //     for($i=0;$i<9;$i++)
    //     {
    //         $meal_id = $meals_array['results'][$i]['id'];
    //         $info_url = 'https://api.spoonacular.com/recipes/' . $meal_id . '/information?apiKey=9d29dd77f35b4d199ea2925104bb46d8&includeNutrition=true';
    //         $info_json = file_get_contents($info_url);
    //         $info_array = json_decode($info_json, true);
    //         array_push($meals_summary,substr($info_array['summary'],0,50));
    //         array_push($meals_calorie,$info_array['nutrition']['nutrients'][0]['amount']);
    //     }
    // }
?>

<form action="" method="GET">
    <input type="text" name="search">
    <button>Submit</button>
</form>

<?php
    // if(!empty($meals_array))
    // {
    //     $meals = $meals_array['results'];
    //     for($i=0;$i<3;$i++){
    //         echo $meals[$i]['title'] . '<br>';
    //         echo $meals_calorie[$i] . '<br>';
    //         echo $meals_summary[$i] . '...<br>';
    //     }
    // }
?> -->

<?php
    $servername = "localhost";
    $username = "root";
    $password = "shresth";
    
    // Create connection
    $conn = mysqli_connect("localhost","root","shresth","MealWagon");

    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
    }

    // $sql = "SELECT * from meal WHERE user='Arnab1'";

    // if ($result = mysqli_query($con, $sql)) {
    // $row = mysqli_fetch_row($result);

    // $meal_id_a = $row[1];
    // $meal_title_a = $row[4];
    // $meal_image_a = $row[2];
    // $meal_time_a = $row[6];
    // $meal_calories_a = $row[8];
    // $meal_servings_a = $row[7];
    // $meal_protein_a = $row[9];
    // $meal_fat_a = $row[10];
    // $meal_satfat_a = $row[11];
    // $meal_carb_a =  $row[12];
    // $meal_sugar_a = $row[13];
    // $meal_sodium_a = $row[14];
    

    // $row = mysqli_fetch_row($result);
    
    // $meal_id_b = $row[1];
    // $meal_title_b = $row[4];
    // $meal_image_b = $row[2];
    // $meal_time_b = $row[6];
    // $meal_calories_b = $row[8];
    // $meal_servings_b = $row[7];
    // $meal_protein_b = $row[9];
    // $meal_fat_b = $row[10];
    // $meal_satfat_b = $row[11];
    // $meal_carb_b =  $row[12];
    // $meal_sugar_b = $row[13];
    // $meal_sodium_b = $row[14];

    // $row = mysqli_fetch_row($result);
    
    // $meal_id_c = $row[1];
    // $meal_title_c = $row[4];
    // $meal_image_c = $row[2];
    // $meal_time_c = $row[6];
    // $meal_calories_c = $row[8];
    // $meal_servings_c = $row[7];
    // $meal_protein_c = $row[9];
    // $meal_fat_c = $row[10];
    // $meal_satfat_c = $row[11];
    // $meal_carb_c =  $row[12];
    // $meal_sugar_c = $row[13];
    // $meal_sodium_c = $row[14];
    // }

    // $sql = "UPDATE user
    // SET Daily_Fat_Intake = Daily_Fat_Intake + 5,  Daily_Protein_Intake = Daily_Protein_Intake + 10
    // WHERE Name = 'Arnab2'";

    // if ($conn->query($sql) === TRUE) {
    //     echo "user table created successfully" . "<br>";
    // } else {
    //     echo "Error creating user table: " . $conn->error . "<br>";
    // }

    // $sql = "SELECT * from user WHERE Name='Arnab3'";
    // if ($result = mysqli_query($conn, $sql))
    // {
    //     if(mysqli_num_rows($result) > 0)
    //     {
    //         $row = mysqli_fetch_row($result);
    //         $calories_consumed = $row[9];
    //         $protein_consumed = $row[10];
    //         $carb_consumed = $row[11];
    //         $fat_consumed = $row[12];
    //     }
    // }

    // echo $calories_consumed/2000 . '</br>';
    // echo $protein_consumed . '</br>';
    // echo $carb_consumed. '</br>';
    // echo $fat_consumed . '</br>';

    $sql = "DELETE FROM meal WHERE user = 'Arnab2'";
    if ($conn->query($sql) === TRUE) {
        echo "user table created successfully" . "<br>";
    } else {
        echo "Error creating user table: " . $conn->error . "<br>";
    }
?>

