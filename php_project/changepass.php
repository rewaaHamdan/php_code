<!DOCTYPE html>
<html>
<head>
  <title>Update Password</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
 
  <div class="container">
        
        <div class="box">
            <h2>UpDate Password</h2>
            <form action="#" method="POST">

                <div class="input_box">
                <br><br>
                <input type="email" id="email" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input_box">
                    <br><br><br>
                    <input type="password" id="re_pass" name="new_pass" required>
                    <label>New Password</label>
                </div>
                <div class="input_box">
                    <br><br><br>
                    <input type="password" id="re_pass" name="re_pass" required>
                    <label>Confirm Password</label>
                </div>

             
              <button class="login_button" type="submit" name="submit" value="Update">Change</button>
              <button class="login_button" type="submit"><a href="profile.php">back</a></button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
include 'conn.php';

// استلام بيانات المستخدم من نموذج POST
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $new_pass = $_POST['new_pass'];
  $re_pass = $_POST['re_pass'];

  // استعلام محمي من الهجمات SQL لاسترداد معرف المستخدم المتعلق بالاسم المستخدم
  $query = "SELECT id FROM users WHERE email = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $count = mysqli_stmt_num_rows($stmt);

  if ($count == 1) {
    // التحقق من تطابق الكلمة الجديدة مع الكلمة المعادة
    if ($new_pass == $re_pass) {
      // استعلام محمي من الهجمات SQL لتحديث كلمة المرور الجديدة في قاعدة البيانات
      $update_query = "UPDATE users SET password = ? WHERE email = ?";
      $update_stmt = mysqli_prepare($conn, $update_query);
      mysqli_stmt_bind_param($update_stmt, "ss", md5($new_pass), $email);
      mysqli_stmt_execute($update_stmt);

      if (mysqli_stmt_affected_rows($update_stmt) > 0) {
        echo "<script>alert('Password updated successfully');</script>";
    } else {
      echo "<script>alert('Error updating password');</script>";
    }
  } else {
    echo "<script>alert('New password does not match');</script>";
  }
} else {
  echo "<script>alert('Invalid username');</script>";
}

}

// إغلاق اتصال قاعدة البيانات
mysqli_close($conn);
?>

