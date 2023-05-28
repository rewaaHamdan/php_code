<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Profile</title>
    <link rel="stylesheet" href="login.css">

</head>
<body>
<header>
        <div class="inner">
            <div class="logo">
                <div>
                   
                    <h2 class="h">Portal</h2>
                    
                </div>
            </div>

            <nav>
                
            <li><span><a href="">Home</a></span></li>
            <li><span><a href="">About</a></span></li>
            <li><span><a href="">Contact</a></span></li>
            <li><span><a href="">Blog</a></span></li>
                
            </nav>
        </div>
    </header>
    
    <div class="container">
        <div class="box">
        <h2>Profile</h2>
        <h1>***welcome <span><?php echo $_SESSION['user'] ?></span>***</h1>
        <button class="login_button" type="submit" name="create"><a href="logout.php" >Log Out</a></button>
        <button class="login_button" type="submit" name="create"><a href="changepass.php">Channge Password</a></button>
        <div class="login_link" ><p > Create anthor Account </p></div>
        <button class="login_button" type="submit" name="create"><a href="signup.php">Create Account</a></button>
</div>
</div>
    <footer>
        <div class="footer-content">
            <h3>user management</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic modi quod exercitationem aliquam dolore animi sunt molestiae sequi repellat eligendi sint amet, nobis quis, quae placeat minima obcaecati adipisci delectus.</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; <a href="#">user mangement</a>  </p>
                    <div class="footer-menu">
                      <ul class="f-menu">
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="">Blog</a></li>
                      </ul>
                    </div>
        </div>

    </footer>
</body>
</html>