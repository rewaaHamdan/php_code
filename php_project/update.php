

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpDate Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
        <div class="box">
            <h2>UpDate</h2>
<?php
include 'conn.php'; 
$id = $_GET['id'];
	$sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    	$row = mysqli_fetch_assoc($result);
         ?>
            <form action="#" method="post">
            <div class="input_box"><input type="hidden" name="id" value="<?php echo $id; ?>"></div>
                <div class="input_box">
                    <input type="text" name="name" value="<?php echo $row['name']; ?>"required>
                    <label>Username</label>
                </div>

                <div class="input_box">
                    <input type="password" name="password" value="<?php echo $row['password']; ?>" required>
                    <label>Password</label>
                    <div class="password_checkbox"><input type="checkbox"><p>Show Password</p></div>
                </div>

                <div class="input_box">
                    <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                    <label>Email</label>
                </div><br>
        <div class="role">
       <label for="role" >Role : </label>
		<input type="radio" name="role" value="admin"<?php echo ($row['role'] == 'admin') ? "checked" : ""; ?>>
		<label for="admin">admin</label>
		<input type="radio"  name="role" value="user"<?php echo ($row['role'] == 'user') ? "checked" : ""; ?>>
		<label for="user">user</label>
</div>
             
                <button class="signup_button" type="submit" name="update">Up Date</button>
                <button class="signup_button" type="submit"><a href="display.php" style="text-decoration: none;"> Back</a></button>
                <!-- <div class="login_link"><a href="login.php">Already have an Account ?</a></div> -->
            </form>
        </div>
    </div>
</body>
</html>
<?php 
	include "conn.php";
	$id = $_GET['id'];

if(isset($_POST['update'])){
    $name = $_POST['name'];
      $password= $_POST['password'];
      $email = $_POST['email'];
      $role = $_POST['role'];

    $sql = "UPDATE users SET name=?, password=?, email=? , role=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $name, md5($password), $email,$role, $id);
    mysqli_stmt_execute($stmt);
    
       if ($stmt) {
        echo "<script> alert ('Data updated successfully')</script>";
       }else {
        echo "Failed: " . mysqli_error($conn);
	}
}
?>