<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Meal Wagon</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../CSS/login.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    </head>
    <body>
        <section class="container">
            <div class="image">
                <img class="logo" src="../Images/logo (1).png" alt="">
                <img class="img" src="../Images/image 1.jpg" alt="">
            </div>
            <div class="login-container">
                <form action="val.php" class="login" method="post">
                    <img class="user-img" src="../Images/undraw_profile_pic_ic5t (2).svg" alt="">
                    <h2>Log In</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                            <input class="input" type="text" placeholder="Username" name="username">
                        </div>
                    </div>
                    <div class="input-div two">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                            <input class="input" type="password" placeholder="Password" name="password">
                        </div>
                    </div>
                    <input type="submit" class="btn" value="Login">
                    <h5>New to Meal Wagon?</h5>
                    <div class="signup">
                        
                        <a href="signup.php">Sign-Up </a>

                        <h5> now</h5>
                    </div>
                </form>
            </div>
            
        </section>
        
        <script src="" async defer></script>
    </body>
</html>