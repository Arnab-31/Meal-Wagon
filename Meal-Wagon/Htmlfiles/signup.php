<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Meal Wagon</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../CSS/signup.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    </head>
    <body>
        <section class="container">
            <div class="image">
                <img class="logo" src="../Images/logo (1).png" alt="">
                <img class="img" src="../Images/image 1.jpg" alt="">
            </div>
            <div class="login-container">
                <form action="reg.php" class="login" method="post">
                    <img class="user-img" src="../Images/undraw_profile_pic_ic5t (2).svg" alt="">
                    <h2>Sign Up</h2>
                    <div class="input-div one">
                            <div class="i">
                                <i class="fa fa-user"></i>
                                <input class="input" type="text" placeholder="Name" name="username">
                            </div>
                    </div>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fa fa-envelope"></i>
                            <input class="input" type="email" placeholder="E-mail Address" name="email">
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="i">   
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            <input class="input" type="password" placeholder="Create Password" name="password">
                        </div> 
                     </div>
                     <div class="input-div one">
                        <div class="i">
                            <i class="fa fa-lock"></i>
                            <input class="input" type="password" placeholder="Confirm Password" name="cnfpassword">
                        </div>
                     </div>
                    
                    
                    <input type="submit" class="btn" value="Signup">
                    <h5>Already have an Account?</h5>
                    <div class="signup">
                        
                        <a href="login.php">Log-in </a>

                        <h5> now</h5>
                    </div>
                </form>
            </div>
            
        </section>
        
       
    </body>
    <script src="../Javascript/search.js"></script>
</html>