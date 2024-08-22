<?php

session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") 
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) 
{
        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

if($result)
{

        if($result && mysqli_num_rows($result)>0) 
{
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['password'] === $password) 
{
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index1.php");
                die;
            }
        }
        
}
echo "wrong username or password!";
    } else
 {
        echo "wrong username or password!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/all.css">
</head>
<body>
    <div class="shell" >
      <div class="shell-main">
          <div class="shell-main-nav" style="margin-bottom:50px;">
              <div class="logo">
                  <img src="logo.png" alt="">
                  <span>Seventeen's Store</span>
              </div>
              <ul>
                    <li><a href="homepage.html">Home</a></li>
                    <li><a href="product.html">Product</a></li>
                    <li><a href="packages.html">Packages</a></li>
                    <li><a href="purchase.html">Purchase</a></li>
                    <li><a href="index.html">Contact us</a></li>
                    <li><a href="signup.php">Sigup/Login</a></li>
                  <div class="nav-box"></div>
              </ul>
          </div>


    <style type="text/css">

       html,body {
  background: linear-gradient(to bottom, #91a8d0, #f7cac9);
  height: 100%;
}


#text{

height: 25px;

border-radius: 5px;

padding: 4px;

border: solid thin #aaa; 
width: 100%;

}

#button{

padding: 10px;

width: 100px; 
background-color: pink;
color: white;
border: none;
}

#box {

background-color:#91a8d0;
justify-content: center;

margin: auto; 
width: 500px;
padding: 100px;
}
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; margin:10px;color:white;">Login</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" name="login" value="Login"><br><br>


            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    </div>
</body>
</html>
