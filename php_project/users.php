<?php
session_start();
class Users{

    function createUser ($name,$password,$email,$role){
    //  $conn = new mysqli("localhost","root","", "php_prog");
    //   $conn = new mysqli($dbhost,$dbuser,$dbpass, $dbname);
    // ربط ملف الاتصال بقاعدة البيانات
    include 'conn.php';
    // إعداد استعلام SQL لإدخال بيانات المستخدم الجديد في جدول المستخدمين
    $stmt = $conn->prepare("INSERT INTO users (name, password, email, role) VALUES (?, ?, ?, ?)");
    // bind_param لتمرير قيم المتغيرات إلى الاستعلام المحضر
     // يستخدم md5() لتشفير كلمة المرور قبل حفظها في قاعدة البيانات
    $stmt->bind_param("ssss", $name,md5($password), $email,$role);
    $stmt->execute();
    
   
    echo 
    "<script> alert('Registration Successful Go Now To Login'); </script>";
    // إعادة تعيين قيم المتغيرات بعد الإدخال الناجح
    $_POST['name']='';
    $_POST['email']='';
    
}
    

    
function login  ($name,$password){
    // $conn = new mysqli("localhost","root","", "php_prog");
    // $conn = new mysqli($dbhost,$dbuser,$dbpass, $dbname);
    include 'conn.php';
// $stmt = $conn->prepare("SELECT * FROM  users WHERE name='$name' AND password ='$password'");
// $stmt->bind_param("ss", $name,$password);
// $stmt->execute();
//     $result =$stmt->fetch();
// if(!$result){
//     echo 'Error in login process';
//  }else{
    
//       $password_db=$result['password'];
//       $role=$result['role'];
//       if($password==$password_db){
//          if($role=='user'){
//            $_SESSION['user']=$name;
//            header("Location :profile.php");
//          }else{
//              header("Location :display.php");
//          }

//       }
//  }
$select = "SELECT * FROM users WHERE name = ? AND password = ?";
$stmt = mysqli_prepare($conn, $select);
mysqli_stmt_bind_param($stmt, "ss", $name, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
// لفحص عدد الصفوف المسترجعة من نتيجة الاستعلام 
// إذا كانت النتيجة أكبر من صفر، فهذا يعني أن هناك مستخدمين يحملون الاسم وكلمة المرور المطلوبين

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    if ($row['role'] == 'user') {
        $_SESSION['user'] = $name;
        header("Location: profile.php");
    } elseif ($row['role'] == 'admin') {
        header("Location: display.php");
    } else {
        // إذا كان الدور غير معروف
        echo "<script> alert('Incorrect username or password')</script>";
    }
} else {
    // إذا لم يتم العثور على سجل مطابق
    echo "<script> alert('Incorrect username or password')</script>";
}

}    


}