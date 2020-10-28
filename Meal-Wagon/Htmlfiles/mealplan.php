<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Meal</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/mealplan.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.0/circle-progress.min.js"></script>
</head>
<body>
    <section class="evr">
        <nav class="container-nav">
            <img src="../Images/logo (1).png" alt="">
            <div class="right-nav">
                <div class="search-bar">
                    <input type="text" placeholder="search meals">
                    <a href="search.php"><i class="fas fa-search"></i></a>
                </div>
                <a href="preferences.php">Preferences</a>
                <a href=""  class="active">My Meal</a>
                <h2>Hello, <br><?php echo $_SESSION['username']; ?> </h2>
            </div>
        </nav>

        <div class="top-img">
            <div class="txt">
                <p>Today's Meal Plan</p>  
                <div class="today"> 
                    <div id="date"></div><div id="month"> </div><div id="year"></div>
                </div>
             </div>
            <img src="../Images/image 29.png" alt="">
            
        </div>

        

        
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $user = $_SESSION['username'];
            
            // Create connection
            $conn = new mysqli($servername, $username, $password);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
    
            $db=mysqli_select_db($conn,'MealWagon');
            if (!$db)
                    echo "Database not selected" . "<br>";
            else
                echo "Database selected" . "<br>";
                   
            

            if(!empty($_POST['calories']))
            {
                $sql = "UPDATE user
                SET Dailiy_Calorie_Intake = Dailiy_Calorie_Intake +" . $_POST['calories'] . ", Daily_Protein_Intake = Daily_Protein_Intake +" . $_POST['protein'] . ", Daily_Carb_Intake = Daily_Carb_Intake +" . $_POST['carb'] . ", Daily_Fat_Intake = Daily_Fat_Intake +" . $_POST['fat'] . "
                    WHERE Name = '$user'";
    
                if ($conn->query($sql) === TRUE) {
                    echo "Calories updated" . "<br>";
                } else {
                    echo "Error updating calories: " . $conn->error . "<br>";
                }
            }
        
            $sql = "SELECT * from meal WHERE user='$user'";

        if ($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {

                $row = mysqli_fetch_row($result);
            
                $meal_id_a = $row[1];
                $meal_title_a = $row[4];
                $meal_image_a = $row[2];
                $meal_time_a = $row[6];
                $meal_calories_a = $row[8];
                $meal_servings_a = $row[7];
                $meal_protein_a = $row[9];
                $meal_fat_a = $row[10];
                $meal_satfat_a = $row[11];
                $meal_carb_a =  $row[12];
                $meal_sugar_a = $row[13];
                $meal_sodium_a = $row[14];
                
            
                $row = mysqli_fetch_row($result);
                
                $meal_id_b = $row[1];
                $meal_title_b = $row[4];
                $meal_image_b = $row[2];
                $meal_time_b = $row[6];
                $meal_calories_b = $row[8];
                $meal_servings_b = $row[7];
                $meal_protein_b = $row[9];
                $meal_fat_b = $row[10];
                $meal_satfat_b = $row[11];
                $meal_carb_b =  $row[12];
                $meal_sugar_b = $row[13];
                $meal_sodium_b = $row[14];
            
                $row = mysqli_fetch_row($result);
                
                $meal_id_c = $row[1];
                $meal_title_c = $row[4];
                $meal_image_c = $row[2];
                $meal_time_c = $row[6];
                $meal_calories_c = $row[8];
                $meal_servings_c = $row[7];
                $meal_protein_c = $row[9];
                $meal_fat_c = $row[10];
                $meal_satfat_c = $row[11];
                $meal_carb_c =  $row[12];
                $meal_sugar_c = $row[13];
                $meal_sodium_c = $row[14];
            }
            else if(!empty($_GET['calories']))
            {
                $calories = $_GET['calories'];
                // $vegetarian = $_GET['vegetarian'];
                // $gluten = $_GET['gluten'];
                // $vegan = $_GET['vegan'];
                // $ketogenic = $_GET['ketogenic'];
                // $any = $_GET['any'];
                $calories_url = 'https://api.spoonacular.com/mealplanner/generate?timeFrame=day&targetCalories='.$calories.'&apiKey=9d29dd77f35b4d199ea2925104bb46d8';

                $calories_json = file_get_contents($calories_url);
                $calories_array = json_decode($calories_json, true);
                $a=$calories_array['meals'][0]['id'];
                $b=$calories_array['meals'][1]['id'];
                $c=$calories_array['meals'][2]['id'];
                $recipe_url_a = 'https://api.spoonacular.com/recipes/'.$a.'/information?apiKey=9d29dd77f35b4d199ea2925104bb46d8&includeNutrition=true';
                $recipe_url_b = 'https://api.spoonacular.com/recipes/'.$b.'/information?apiKey=9d29dd77f35b4d199ea2925104bb46d8&includeNutrition=true';
                $recipe_url_c = 'https://api.spoonacular.com/recipes/'.$c.'/information?apiKey=9d29dd77f35b4d199ea2925104bb46d8&includeNutrition=true';
                $recipe_json_a = file_get_contents($recipe_url_a);
                $recipe_json_b = file_get_contents($recipe_url_b);
                $recipe_json_c = file_get_contents($recipe_url_c);
                $recipe_array_a = json_decode($recipe_json_a, true);
                $recipe_array_b = json_decode($recipe_json_b, true);
                $recipe_array_c = json_decode($recipe_json_c, true);

                $meal_id_a = $calories_array['meals'][0]['id'];
                $meal_title_a = $calories_array['meals'][0]['title'];
                $meal_image_a = $recipe_array_a['image'];
                $meal_time_a = $calories_array['meals'][0]['readyInMinutes'];
                $meal_calories_a = $recipe_array_a['nutrition']['nutrients'][0]['amount'];
                $meal_servings_a = $calories_array['meals'][0]['servings'];
                $meal_protein_a = $recipe_array_a['nutrition']['nutrients'][9]['amount'];
                $meal_fat_a = $recipe_array_a['nutrition']['nutrients'][1]['amount'];
                $meal_satfat_a = $recipe_array_a['nutrition']['nutrients'][2]['amount'];
                $meal_sugar_a = $recipe_array_a['nutrition']['nutrients'][5]['amount'];
                $meal_sodium_a = $recipe_array_a['nutrition']['nutrients'][7]['amount'];
                $meal_carb_a =  $recipe_array_a['nutrition']['nutrients'][3]['amount'];
                
                $sql = "INSERT into Meal(user, mealId,name,image,prep_time,calories,servings,protein,fat,saturated_fat,carb,sugar,sodium) VALUES ('$user', '$meal_id_a','$meal_title_a','$meal_image_a','$meal_time_a','$meal_calories_a','$meal_servings_a','$meal_protein_a','$meal_fat_a','$meal_satfat_a','$meal_carb_a','$meal_sugar_a','$meal_sodium_a')";    
                if ($conn->query($sql) === TRUE) {
                    echo "meal table created successfully " . "<br>";
                }else{
                    echo "Error creating meal table: " . $conn->error . "<br>";
                }


                $meal_id_b = $calories_array['meals'][1]['id'];
                $meal_title_b = $calories_array['meals'][1]['title'];
                $meal_image_b = $recipe_array_b['image'];
                $meal_time_b = $calories_array['meals'][1]['readyInMinutes'];
                $meal_calories_b = $recipe_array_b['nutrition']['nutrients'][0]['amount'];
                $meal_servings_b = $calories_array['meals'][1]['servings'];
                $meal_protein_b = $recipe_array_b['nutrition']['nutrients'][9]['amount'];
                $meal_fat_b = $recipe_array_b['nutrition']['nutrients'][1]['amount'];
                $meal_satfat_b = $recipe_array_b['nutrition']['nutrients'][2]['amount'];
                $meal_sugar_b = $recipe_array_b['nutrition']['nutrients'][5]['amount'];
                $meal_sodium_b = $recipe_array_b['nutrition']['nutrients'][7]['amount'];
                $meal_carb_b =  $recipe_array_b['nutrition']['nutrients'][3]['amount'];
                
                $sql = "INSERT into Meal(user, mealId,name,image,prep_time,calories,servings,protein,fat,saturated_fat,carb,sugar,sodium) VALUES ('$user', '$meal_id_b','$meal_title_b','$meal_image_b','$meal_time_b','$meal_calories_b','$meal_servings_b','$meal_protein_b','$meal_fat_b','$meal_satfat_b','$meal_carb_b','$meal_sugar_b','$meal_sodium_b')";    
                if ($conn->query($sql) === TRUE) {
                    echo "meal table created successfully " . "<br>";
                }else{
                    echo "Error creating meal table: " . $conn->error . "<br>";
                }


                $meal_id_c = $calories_array['meals'][2]['id'];
                $meal_title_c = $calories_array['meals'][2]['title'];
                $meal_image_c = $recipe_array_c['image'];
                $meal_time_c = $calories_array['meals'][2]['readyInMinutes'];
                $meal_calories_c = $recipe_array_c['nutrition']['nutrients'][0]['amount'];
                $meal_servings_c = $calories_array['meals'][2]['servings'];
                $meal_protein_c = $recipe_array_c['nutrition']['nutrients'][9]['amount'];
                $meal_fat_c = $recipe_array_c['nutrition']['nutrients'][1]['amount'];
                $meal_satfat_c = $recipe_array_c['nutrition']['nutrients'][2]['amount'];
                $meal_sugar_c = $recipe_array_c['nutrition']['nutrients'][5]['amount'];
                $meal_sodium_c = $recipe_array_c['nutrition']['nutrients'][7]['amount'];
                $meal_carb_c =  $recipe_array_c['nutrition']['nutrients'][3]['amount'];

                
                
                $sql = "INSERT into Meal(user, mealId,name,image,prep_time,calories,servings,protein,fat,saturated_fat,carb,sugar,sodium) VALUES ('$user', '$meal_id_c','$meal_title_c','$meal_image_c','$meal_time_c','$meal_calories_c','$meal_servings_c','$meal_protein_c','$meal_fat_c','$meal_satfat_c','$meal_carb_c','$meal_sugar_c','$meal_sodium_c')";    
                if ($conn->query($sql) === TRUE) {
                    echo "meal table created successfully " . "<br>";
                }else{
                    echo "Error creating meal table: " . $conn->error . "<br>";
                }
                
            }
        }
            $total_calories = $meal_calories_a + $meal_calories_b + $meal_calories_c;
            $total_fats = $meal_fat_a + $meal_fat_b + $meal_fat_c;
            $total_carb = $meal_carb_a + $meal_carb_b + $meal_carb_c;
            $total_protein = $meal_protein_a + $meal_protein_b + $meal_protein_c;

            $sql = "SELECT * from user WHERE Name='$user'";
            if ($result = mysqli_query($conn, $sql))
            {
                if(mysqli_num_rows($result) > 0)
                {
                    $row = mysqli_fetch_row($result);
                    $calories_consumed = $row[9];
                    $protein_consumed = $row[10];
                    $carb_consumed = $row[11];
                    $fat_consumed = $row[12];
                }
            }

            $calories_percentage = ($calories_consumed/$total_calories);
            $fats_percentage = ($fat_consumed/$total_fats);
            $carb_percentage = ($carb_consumed/$total_carb);
            $protein_percentage = ($protein_consumed/$total_protein);

      
        echo '
        <div class="card">
            <div class="meals">
                <h2>Breakfast</h2>
                <div class="box-1">
                    <img src="'.$meal_image_a.'">
                    <div class="txt">
                        <h3>'.$meal_title_a.'</h3>
                        <h4>Ready In-'.$meal_time_a .'min <br>Servings-'. $meal_servings_a .' <br>Calories- ' . $meal_calories_a . '</h4>
                        <h3>Nutrients</h3>
                        <h4>Protien- ' .$meal_protein_a . '</h4>
                        <h4>Fat-' . $meal_fat_a . '</h4>
                        <h4>Saturated Fat- ' . $meal_satfat_a . '</h4>
                        <h4>Carbohydrate- ' . $meal_carb_a . '</h4>
                        <h4>Sugar-' . $meal_sugar_a . '</h4>
                        <h4>Sodium-' . $meal_sodium_a . '</h4>
                        
                    </div>

                    <div class="btns">
                        <form action="" method="POST"> 
                            <input style="display:none;" name="calories" type="number" value="'.  $meal_calories_a .'">
                            <input style="display:none;" name="protein" type="number" value="'.  $meal_protein_a .'">
                            <input style="display:none;" name="fat" type="number" value="'.  $meal_fat_a .'">
                            <input style="display:none;" name="carb" type="number" value="'.  $meal_carb_a .'">
                            <button>Consume</button>
                        </form>
                        <a href="recipe.php?id='.$meal_id_a.'" class="recipe">Get Recipe</a>
                    </div>
                </div>
                <button class="view-more-1">View More</button>
            </div>       
            
            <div class="meals">
                <h2>Lunch</h2>
                <div class="box-2">
        
                    <img src="'.$meal_image_b.'">
                    <div class="txt">
                        <h3>'.$meal_title_b.'</h3>
                        <h4>Ready In-'.$meal_time_b .'min <br>Servings-'. $meal_servings_b .' <br>Calories- ' . $meal_calories_b . '</h4>
                        <h3>Nutrients</h3>
                        <h4>Protien- ' .$meal_protein_b . '</h4>
                        <h4>Fat-' . $meal_fat_b . '</h4>
                        <h4>Saturated Fat- ' . $meal_satfat_b . '</h4>
                        <h4>Carbohydrate- ' . $meal_carb_b . '</h4>
                        <h4>Sugar-' . $meal_sugar_b . '</h4>
                        <h4>Sodium-' . $meal_sodium_b . '</h4>
                    </div>
                    <div class="btns">
                    <form action="" method="POST"> 
                        <input style="display:none;" name="calories" type="number" value="'.  $meal_calories_b .'">
                        <input style="display:none;" name="protein" type="number" value="'.  $meal_protein_b .'">
                        <input style="display:none;" name="fat" type="number" value="'.  $meal_fat_b .'">
                        <input style="display:none;" name="carb" type="number" value="'.  $meal_carb_b .'">
                        <button>Consume</button>
                    </form>
                        <a href="recipe.php?id='.$meal_id_b.'" class="recipe">Get Recipe</a>
                    </div>
                </div>
                <button class="view-more-2">View More</button>

                
            </div>

            <div class="meals">
                <h2>Dinner</h2>
                <div class="box-3">
        
                    <img src="'.$meal_image_c.'">
                    <div class="txt">
                        <h3>'.$meal_title_c.'</h3>
                        <h4>Ready In-'.$meal_time_c .'min <br>Servings-'. $meal_servings_c .' <br>Calories- ' . $meal_calories_c . '</h4>
                        <h3>Nutrients</h3>
                        <h4>Protien- ' .$meal_protein_c . '</h4>
                        <h4>Fat-' . $meal_fat_c . '</h4>
                        <h4>Saturated Fat- ' . $meal_satfat_c . '</h4>
                        <h4>Carbohydrate- ' . $meal_carb_c . '</h4>
                        <h4>Sugar-' . $meal_sugar_c . '</h4>
                        <h4>Sodium-' . $meal_sodium_c . '</h4>
                        
                    </div>
                    <div class="btns">
                    <form action="" method="POST"> 
                        <input style="display:none;" name="calories" type="number" value="'.  $meal_calories_c .'">
                        <input style="display:none;" name="protein" type="number" value="'.  $meal_protein_c .'">
                        <input style="display:none;" name="fat" type="number" value="'.  $meal_fat_c .'">
                        <input style="display:none;" name="carb" type="number" value="'.  $meal_carb_c .'">
                        <button>Consume</button>
                    </form>
                        <a href="recipe.php?id='.$meal_id_c.'" class="recipe">Get Recipe</a>
                    </div>
                </div>

                <button class="view-more-3">View More</button>

                
            </div>

        </div>
        <hr>
        <div class="progress-bar">
            <div class="circle-1">
                <div class="round-1" data-value="' .$fats_percentage. '" data-size="120" data-thickness="12">
                    <strong></strong>
                    
                </div>
                <h3>Fats: '.$fat_consumed . '/' .$total_fats.'</h3>
            </div>
            <div class="circle-2">
                <div class="round-2" data-value="' .$calories_percentage. '" data-size="160" data-thickness="13">
                    <strong></strong>
                </div>
                <h3>Calories: '.$calories_consumed . '/' . $total_calories.'</h3>
            </div>
            <!-- <div class="circle-3">
                <div class="round-3" data-value="" data-size="200" data-thickness="14">
                    <strong></strong>
                </div>
                <h3></h3>
            </div> -->
            <div class="circle-4">
                <div class="round-4" data-value="' .$carb_percentage. '" data-size="160" data-thickness="13">
                    <strong></strong>
                </div>
                <h3>Carbohydrates: '.$carb_consumed . '/' .$total_carb.'</h3>
            </div>
            <div class="circle-5">
                <div class="round-5" data-value="' .$protein_percentage. '" data-size="120" data-thickness="12">
                    <strong></strong>
                </div>
                <h3>Proteins: '.$protein_consumed . '/' .$total_protein.'</h3>
            </div>
        </div>
        
        ';
        ?>

    </section>
    <script>
        var y=new Date();
        var m=new Date();
        var d=new Date();
        document.getElementById("date").innerHTML=d.getDate();
        var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        document.getElementById("month").innerHTML = months[d.getMonth()]; 
        document.getElementById("year").innerHTML=y.getFullYear();  
    </script>
    <script>
        function circlle_1(el){
            $(el).circleProgress({fill:{color:'#00F3EC'}})
            .on('circle-animation-progress',function(event,progress,stepValue){
                $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2.0)+'%');
            });
        };
        function circlle_2(el){
            $(el).circleProgress({fill:{color:'#FF7C00'}})
            .on('circle-animation-progress',function(event,progress,stepValue){
                $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'%');
            });
        };
        function circlle_3(el){
            $(el).circleProgress({fill:{color:'#FF3A00'}})
            .on('circle-animation-progress',function(event,progress,stepValue){
                $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'%');
            });
        };
        function circlle_4(el){
            $(el).circleProgress({fill:{color:'#E7EE00'}})
            .on('circle-animation-progress',function(event,progress,stepValue){
                $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2.0)+'%');
            });
        };
        function circlle_5(el){
            $(el).circleProgress({fill:{color:'#00FF46'}})
            .on('circle-animation-progress',function(event,progress,stepValue){
                $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2.0)+'%');
            });
        };

        circlle_1('.round-1');
        circlle_2('.round-2');
        circlle_3('.round-3');
        circlle_4('.round-4');
        circlle_5('.round-5');
        
    </script>

    <script>
        $(".view-more-1").on('click',function(){
            $('.box-1').toggleClass("showContent");
            $(this).parent().toggleClass("showContent");

            var replacetext=$('.box-1').hasClass("showContent")?"View Less":"View More";
            $(this).text(replacetext);
        });

        $(".view-more-2").on('click',function(){
            $('.box-2').toggleClass("showContent");
            $(this).parent().toggleClass("showContent");

            var replacetext=$('.box-2').hasClass("showContent")?"View Less":"View More";
            $(this).text(replacetext);
        });

        $(".view-more-3").on('click',function(){
            $('.box-3').toggleClass("showContent");
            $(this).parent().toggleClass("showContent");

            var replacetext=$('.box-3').hasClass("showContent")?"View Less":"View More";
            $(this).text(replacetext);
        });
    </script>
</body>
</html>