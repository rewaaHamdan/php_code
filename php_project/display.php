<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="display.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>WELLCOME !</title>
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
            <li><span><a href="logout.php" class="logout">Log Out</a></span></li>
                
            </nav>
        </div>
    </header>
    <!-- <div  style="background: linear-gradient(45deg , rgb(135 129 255) , rgb(255 110 110));" > -->
     
        
   <div class="containerr"> 
    <div class="box">
  <table class="table" >
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Name</th>
      <th scope="col">Password</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  
    <?php
        include "conn.php";
        $sql = "select * from users";
        $result = $conn->query($sql);
        // التحقق من صحة الاستعلام
        if(!$result){
          die("Invalid query!");
        }// عرض النتائج
        while($row=$result->fetch_assoc()){
          // للوصول إلى قيم الأعمدة المحددة في صف
          echo "
      <tr>
        <th>$row[id]</th>
        <td>$row[name]</td>
        <td>$row[password]</td>
        <td>$row[email]</td>
        <td>$row[role]</td>
        <td>$row[Created_at]</td>
       
        <td>
        <a class='btn btn-primary' href='update.php?id=$row[id]'>Edit</a>
        <a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a>
      </td>
</tr>
      ";
        }
      ?>
    
    
  </tbody> 
</table>
<button class="btn btn-primary my-5"><a href="signup.php" class="text-light">Add user</a></button>

      
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