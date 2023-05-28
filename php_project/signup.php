<?php
include 'Users.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Signup Form</title>
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
            <h2>Signup</h2>
            <form method="post" enctype="multipart/form-data">
           
                <div class="input_box">
                    <input type="text" name="name" value ="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>"required>
                    <label>Username</label>
                </div>

                <div class="input_box">
                    <input  type="password" name="password" required>
                    <label>Password</label>
                    <div class="password_checkbox"><input type="checkbox"><p>Show Password</p></div>
                </div>

                <div class="input_box">
                <input  type="password" name="conPassword" required>
                    <label>Confirm Password</label>
                </div>

                <div class="input_box">
                    <input  type="email"  name="email"value ="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" required>
                    <label>Email</label>
                </div><br>
        <div class="role">
       <label for="role" >Role : </label>
		<input type="radio" name="role" value="admin" required>
		<label for="admin">admin</label>
		<input type="radio"  name="role" value="user">
		<label for="user">user</label>
</div>
             
                <button class="signup_button" type="submit" name="create">Create Account</button>
                <div class="login_link"><a href="login.php">Already have an Account ?</a></div>
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
  if(isset($_POST["create"])){
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $confirmpassword= filter_var($_POST['conPassword'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $role = $_POST['role'];
    
     // التحقق من إدخال البيانات المطلوبة
    if (empty($name)) {
        echo  "<script> alert('Please enter your name')</script>";
                exit();
            }
        
            if (empty($email)) {
                echo  "<script> alert ('Please enter your email')</script>";
               exit();
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo  "<script> alert ('Invalid email format')</script>"; 
                exit(); 
            }
               include 'conn.php';
            $stmt = "SELECT email FROM users WHERE email = '$email'";
            $con=$conn->prepare($stmt);
            $con->execute();
            $data=$con->fetch();
             // التحقق من تكرار عنوان البريد الإلكتروني
            if($data){
                echo  "<script> alert ('Email has already taken')</script>";
                exit();
            }

            if (empty($password)) {
                echo  "<script> alert ('Please enter a password')</script>";
                exit();
            } else if (strlen($password) < 8) {
                echo  "<script> alert ('Password must be at least 8 characters long') </script>";
                exit();
            }
            if($password != $confirmpassword){
                echo  "<script> alert ('Password does not match')</script>";
                exit();
            }

    // إنشاء كائن من الفئة Users واستدعاء الدالة createUser لإضافة المستخدم الجديد
    $obj = new Users();
    $obj->createUser($name,$password,$email,$role);
   
     
  }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $name = $_POST['name'];
//     $password = $_POST['password'];
//     $email = $_POST['email'];
//     $role = "user";

//     $hash = password_hash($password, PASSWORD_DEFAULT);

//     $host = "localhost";
//     $username = "root";
//     $pass = "";
//     $dbname = "php_prog";

//     $conn = new mysqli($host, $username, $pass, $dbname);

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     } else {
//         echo "Connected successfully" . "<br>";
//     }

//     if (empty($name)) {
//         echo "Please enter your name";
//         exit;
//     }

//     if (empty($email)) {
//         echo "Please enter your email";
//         exit;
//     } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         echo "Invalid email format";
//         exit;
//     }

//     if (empty($password)) {
//         echo "Please enter a password";
//         exit;
//     } else if (strlen($password) < 8) {
//         echo "Password must be at least 8 characters long";
//         exit;
//     }

//     $stmt = $conn->prepare("INSERT INTO users (name, password, email, role) VALUES (?, ?, ?, ?)");
//     $stmt->bind_param("ssss", $name, $hash, $email, $role);

//     if ($stmt->execute()) {
//         echo "New record was inserted" . "<br>";
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     $stmt->close();
//     $conn->close();
// }

// echo "Thank you for signing up!";

?>