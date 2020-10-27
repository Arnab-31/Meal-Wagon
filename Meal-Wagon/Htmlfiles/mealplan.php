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
                   
                    if(!empty($_GET['calories'])){
                        $calories = $_GET['calories'];
                        // $vegetarian = $_GET['vegetarian'];
                        // $gluten = $_GET['gluten'];
                        // $vegan = $_GET['vegan'];
                        // $ketogenic = $_GET['ketogenic'];
                        // $any = $_GET['any'];
                        $calories_url = 'https://api.spoonacular.com/mealplanner/generate?timeFrame=day&targetCalories='.$calories.'&apiKey=2212e7d4117843fbb2c07b357d8fa2e5';

                        $calories_json = file_get_contents($calories_url);
                        $calories_array = json_decode($calories_json, true);
                        $a=$calories_array['meals'][0]['id'];
                        $b=$calories_array['meals'][1]['id'];
                        $c=$calories_array['meals'][2]['id'];
                        $recipe_url_a = 'https://api.spoonacular.com/recipes/'.$a.'/information?apiKey=2212e7d4117843fbb2c07b357d8fa2e5&includeNutrition=true';
                        $recipe_url_b = 'https://api.spoonacular.com/recipes/'.$b.'/information?apiKey=2212e7d4117843fbb2c07b357d8fa2e5&includeNutrition=true';
                        $recipe_url_c = 'https://api.spoonacular.com/recipes/'.$c.'/information?apiKey=2212e7d4117843fbb2c07b357d8fa2e5&includeNutrition=true';
                        $recipe_json_a = file_get_contents($recipe_url_a);
                         $recipe_json_b = file_get_contents($recipe_url_b);
                          $recipe_json_c = file_get_contents($recipe_url_c);
                        $recipe_array_a = json_decode($recipe_json_a, true);
                        $recipe_array_b = json_decode($recipe_json_b, true);
                        $recipe_array_c = json_decode($recipe_json_c, true);
                        
                    }
        echo '
        <div class="card">
            <div class="meals">
                <h2>Breakfast</h2>
                <div class="box-1">
                    <img src="'.$recipe_array_a['image'].'">
                    <div class="txt">
                        <h3>'.$calories_array['meals'][0]['title'].'</h3>
                        <h4>Ready In-'.$calories_array['meals'][0]['readyInMinutes'] .'min <br>Servings-'. $calories_array['meals'][0]['servings'] .' <br>Calories- ' . $recipe_array_a['nutrition']['nutrients'][0]['amount'] . '</h4>
                        <h3>Nutrients</h3>
                        <h4>Protien- ' . $recipe_array_a['nutrition']['nutrients'][9]['amount'] . '</h4>
                        <h4>Fat-' . $recipe_array_a['nutrition']['nutrients'][1]['amount'] . '</h4>
                        <h4>Saturated Fat- ' . $recipe_array_a['nutrition']['nutrients'][2]['amount'] . '</h4>
                        <h4>Carbohydrate- ' . $recipe_array_a['nutrition']['nutrients'][3]['amount'] . '</h4>
                        <h4>Sugar-' . $recipe_array_a['nutrition']['nutrients'][5]['amount'] . '</h4>
                        <h4>Sodium-' . $recipe_array_a['nutrition']['nutrients'][7]['amount'] . '</h4>
                        
                    </div>

                    <div class="btns">
                        
                        <a href="recipe.php?id='.$calories_array['meals'][0]['id'].'" class="recipe">Get Recipe</a>
                    </div>
                </div>
                <button class="view-more-1">View More</button>
            </div>       
            
            <div class="meals">
                <h2>Lunch</h2>
                <div class="box-2">
        
                    <img src="'.$recipe_array_b['image'].'">
                    <div class="txt">
                        <h3>'. $calories_array['meals'][1]['title'] .'</h3>
                        <h4>Ready In-'.$calories_array['meals'][1]['readyInMinutes'] .'min <br>Servings-'.$calories_array['meals'][1]['servings'] .' <br>Calories-' . $recipe_array_b['nutrition']['nutrients'][0]['amount'] . '</h4>
                        <h3>Nutrients</h3>
                        <h4>Protien-' . $recipe_array_b['nutrition']['nutrients'][9]['amount'] . '</h4>
                        <h4>Fat-'. $recipe_array_b['nutrition']['nutrients'][1]['amount'] . '</h4>
                        <h4>Saturated Fat-' . $recipe_array_b['nutrition']['nutrients'][2]['amount'] . '</h4>
                        <h4>Carbohydrate-' . $recipe_array_b['nutrition']['nutrients'][3]['amount'] . '</h4>
                        <h4>Sugar-' . $recipe_array_b['nutrition']['nutrients'][5]['amount'] . '</h4>
                        <h4>Sodium-' . $recipe_array_b['nutrition']['nutrients'][7]['amount'] . '</h4>
                        
                    </div>
                    <div class="btns">
                        
                        <a href="recipe.php?id='.$calories_array['meals'][1]['id'].'" class="recipe">Get Recipe</a>
                    </div>
                </div>
                <button class="view-more-2">View More</button>

                
            </div>

            <div class="meals">
                <h2>Dinner</h2>
                <div class="box-3">
        
                    <img src="'.$recipe_array_c['image'].'">
                    <div class="txt">
                        <h3>'.$calories_array['meals'][2]['title'] .'</h3>
                        <h4>Ready In-'. $calories_array['meals'][2]['readyInMinutes'] .' min <br>Servings-'. $calories_array['meals'][2]['servings'].' <br>Calories-' . $recipe_array_c['nutrition']['nutrients'][0]['amount'] . '</h4>
                        <h3>Nutrients</h3>
                        <h4>Protien-' . $recipe_array_c['nutrition']['nutrients'][9]['amount'] . '</h4>
                        <h4>Fat-'. $recipe_array_c['nutrition']['nutrients'][1]['amount'] . '</h4>
                        <h4>Saturated Fat-' . $recipe_array_c['nutrition']['nutrients'][2]['amount'] . '</h4>
                        <h4>Carbohydrate-' . $recipe_array_c['nutrition']['nutrients'][3]['amount'] . '</h4>
                        <h4>Sugar-' . $recipe_array_c['nutrition']['nutrients'][5]['amount'] . '</h4>
                        <h4>Sodium-' . $recipe_array_c['nutrition']['nutrients'][7]['amount'] . '</h4>
                        
                    </div>
                    <div class="btns">
                        
                        <a href="recipe.php?id='.$calories_array['meals'][2]['id'].'" class="recipe">Get Recipe</a>
                    </div>
                </div>

                <button class="view-more-3">View More</button>

                
            </div>

        </div>
        <hr>
        <div class="progress-bar">
            <div class="circle-1">
                <div class="round-1" data-value="0.87" data-size="120" data-thickness="12">
                    <strong></strong>
                    
                </div>
                <h3>Fats: '.$calories_array['nutrients']['fat'].'</h3>
            </div>
            <div class="circle-2">
                <div class="round-2" data-value="0.03" data-size="160" data-thickness="13">
                    <strong></strong>
                </div>
                <h3>Calories: '.$calories_array['nutrients']['calories'].'</h3>
            </div>
            <!-- <div class="circle-3">
                <div class="round-3" data-value=".55" data-size="200" data-thickness="14">
                    <strong></strong>
                </div>
                <h3></h3>
            </div> -->
            <div class="circle-4">
                <div class="round-4" data-value="0.45" data-size="160" data-thickness="13">
                    <strong></strong>
                </div>
                <h3>Carbohydrates: '.$calories_array['nutrients']['carbohydrates'].'</h3>
            </div>
            <div class="circle-5">
                <div class="round-5" data-value="0.12" data-size="120" data-thickness="12">
                    <strong></strong>
                </div>
                <h3>Proteins: '.$calories_array['nutrients']['protein'].'</h3>
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