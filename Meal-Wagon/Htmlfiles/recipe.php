<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/recipe.css">
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <title>Meal Wagon</title>
</head>
<body onload="myFunction()">
    <section>
        <nav class="container-nav">
            <img src="../Images/logo (1).png" alt="">
            <div class="right-nav">
                <div class="search-bar">
                    <input type="text" placeholder="search meals">
                    <a href="../Htmlfiles/search.php"><i class="fas fa-search"></i></a>
                </div>
                <a href="preferences.php">Preferences</a>
                <a href="mealplan.php"  class="active">My Meal</a>
                <h2>Hello</h2>
            </div>
        </nav>
        <?php
            $id=$_GET['id'];
            $recipe_url = "https://api.spoonacular.com/recipes/" . $id . "/information?apiKey=2212e7d4117843fbb2c07b357d8fa2e5&includeNutrition=true";
            $recipe_json = file_get_contents($recipe_url);
            $recipe = json_decode($recipe_json, true);
            $ingredients_data = $recipe['extendedIngredients'];
            $steps_data =  $recipe['analyzedInstructions'];
            $ingredients="";
            $quantity="";
            foreach($ingredients_data as $ingredient){
                $ingredients = $ingredients . $ingredient['name'] . ' <br><br>';
                $quantity = $quantity . $ingredient['amount'] . ' ' . $ingredient['unit'] . ' <br><br>';
            }

            $i=1;
            $steps_string="";
            foreach($steps_data as $steps){
                $s=$steps['steps'];
                foreach($s as $step){
                    $steps_string = $steps_string . $i . '. ' . $step['step'] . '<br>';
                    $i++;
                }
            }
            
            $equipment_url = "https://api.spoonacular.com/recipes/" . $id . "/equipmentWidget.json?apiKey=2212e7d4117843fbb2c07b357d8fa2e5";
            $equipment_json = file_get_contents($equipment_url);
            $equipments_data = json_decode($equipment_json, true);
            $equipments = $equipments_data['equipment'];
            $equipment_string = "";
            $index="";
            $i=1;
            foreach($equipments as $equip){
                $equipment_string = $equipment_string . $equip['name'] . ' <br>';
                $index = $index . $i . '. <br> ';
                $i++;
            }

        echo '<section class="main">
            <div class="dish">
                <img src=" ' . $recipe['image'] . '" alt="">
                <div class="recipe">
                    <h1>' . $recipe['title'] . '<hr></h1>
                    <div class="front">
                        
                        <h2><b>CALORIES - ' . $recipe['nutrition']['nutrients'][0]['amount'] . '</b> </h2>
                        <h3>Protiens - ' . $recipe['nutrition']['nutrients'][9]['amount'] . '</h3>
                        <h3>Fat - ' . $recipe['nutrition']['nutrients'][1]['amount'] . '</h3>
                        <h3>Saturated Fat - ' . $recipe['nutrition']['nutrients'][2]['amount'] . '</h3>
                        <h3>Carbohydrate - ' . $recipe['nutrition']['nutrients'][3]['amount'] . '</h3>
                        <h3>Sugar - ' . $recipe['nutrition']['nutrients'][5]['amount'] . '</h3>
                        <h3>Sodium - ' . $recipe['nutrition']['nutrients'][7]['amount'] . '</h3>

                        
                    </div>
                    
                    
                </div>

            </div>

            <div class="details">
                <div class="navbar">
                    <button id="ing">INGREDIENTS</button>
                    <button id="step">STEP</button>
                    <button id="equip">EQUIPMENT</button>
                </div>
                <div class="content">

                    <div class="ing">
                        <div> ' . $ingredients . '
                        </div>
                        <div> ' . $quantity . '
                        </div>
                    </div>

                    <div class="steps"> ' .$steps_string . '
                    </div>

                    <div class="equip">
                        <div> ' .  $index . '
                        </div>
                        <div>' . $equipment_string . '
                        </div>
                    </div>
                </div>

            </div>
        </section>'
        ?>
        
        

    </section>
</body>

<script src="../Javascript/recipe.js"></script>
</html>