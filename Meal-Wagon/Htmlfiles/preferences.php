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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/preferences.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Meal_Wagon</title>
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
                <a href="" class="active">Preferences</a>
                <a href="mealplan.php">My Meal</a>
                <a href="logout.php"  class="active">LogOut</a>
                <h2>Hello, <br> <?php echo $_SESSION['username']; ?></h2>
            </div>
        </nav>
        <div class="top-img">
            <div class="txt">
                <p>your preferences</p>  
                <p id="sml">Help us with your eating habits,and we will plan <br> your meals accordingly</p>
             </div>
            <img src="../Images/image 13.png" alt="" width="100%">
            
        </div>
        <form action="mealplan.php" method="GET">
        <div class="main">
            <h3>ENTER DAILY CALORIES</h3>
            <form action="" method="POST">
            
            <div class="cal-details">

                <input type="number" placeholder="Enter Calories" name="calories">
                <p>Not sure? Head over to <a href="">BMI/Calories calculator</a> to calculate your <br> daily calories,BMR and much more.</p>
    
            </div>
           
            <hr>
            <h3>CHOOSE DIET TYPE</h3>
            <div class="diet-types">


                <img src="../Images/Group 15.png" alt="">
                <img src="../Images/Group 14.png" alt="">
                <img src="../Images/Group 13.png" alt="">
                <img src="../Images/Group 12.png" alt="">
                <img src="../Images/Group 11.png" alt="">


            </div>

            <hr>

            <div class="cui-int">
                <div class="cui">
                <h3>CUISINE</h3>
                <select name="cuisine" id="">
                    <option value="" disabled selected>Choose a Cuisine</option>
                    <option >Indian</option>
                    <option >Chinese</option>
                    <option >Mexican</option>
                    <option >Thai</option>
                    <option >Japanese</option>
                    <option >French</option>
                </select>
                </div>
                <div class="int">
                    <h3>Intolerances</h3>
                    <select name="intolerances" id="">
                        <option value="" disabled selected>Select your Intolerances</option>
                        <option >Dairy</option>
                        <option >Gluten</option>
                        <option >Caffeine</option>
                        <option >Salicylates</option>
                        <option >Amines</option>
                        <option >FODMAPs</option>
                        <option >Sulfites</option>
                        <option >Fructose</option>
                    </select>
                </div>
                
            </div>
            <div>
                <button id="save">SAVE AND CONTINUE</button>
            </div>
            </form>
            
            



            </form>
             

        </div>

    </section>

    <script type="text/javascript" ></script>
</body>
</html>