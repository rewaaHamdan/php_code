<?php
include 'Users.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css"> -->
    <title>Login Form</title>
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
            <h2>Login</h2>
            <form action="#" method="POST">

                <div class="input_box">
                    <input type="text" name="name" required>
                    <label>Username</label>
                </div>

                <div class="input_box">
                    <br><br><br>
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <div class="password_checkbox"><input type="checkbox"><p>Show Password</p></div>
                </div>

                <div class="forgot_password"><a href="changepass.php">Forgot Password ?</a></div>
                <button class="login_button" type="submit" name="login">Login</button>
                <div class="signup_link"><a href="signup.php">Don't have an Account ?</a></div>
            </form>
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
<?php
 if(isset($_POST["login"])){
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']);
    
    if (empty($name)) {
        echo  "<script> alert('Please enter your name')</script>";
              exit();  
            }
            if (empty($password)) {
                echo  "<script> alert('Please enter a password')</script>";
                exit();
            }
   
        
    $obj = new Users();
    $obj->login($name,$password);

  
 }


?>





