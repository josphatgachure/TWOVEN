<?php

include 'config.php';
session_start();
error_reporting(0);
if(isset($_SESSION['username'])){
    header("location: index.php");
}

if(isset($_POST['submit'])){
      $email = $_POST['Email'];
      $password = md5($_POST['Password']);
}
if(isset($_POST['submit'])){
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $username = $_POST['username'];
    $email = $_POST['Email'];
    $password = md5($_POST['Password']);
    $conf_pass = md5($_POST['conf_pass']);

    if($pass == $conf_pass){
        $sql = "SELECT * FROM 'customers' WHERE Email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(!$result ->num_rows > 0){
            $sql = "INSERT INTO 'customers' ('FirstName', 'LastName', 'username', 'Email', 'Password')
                    VALUES('$fname', '$lname', '$username', '$email', '$pass')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert(' User Registration successful.')</script>";
                $fname = "";
                $lname = "";
                $username = "";
                $email = "";
                $_POST['Password'] = "";
                $_POST['conf_pass'] = "";
            }else{
                echo "<script>alert('Whoops! Something went wrong, Please try again.')</script>";
            }
        }else{
            echo "<script>alert('Whoops! Email Already exists.')</script>";
        }
    }else{
        echo "<script>alert('Passwords not Matched.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
     <linl rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="syles.css">
    <title>Account</title>
    <style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'poppins'sans-serif;
}
body{
    width: 100%;
    min-height: 100vh;
    background-image: url('bikes/scooter.jpg');
    align-items: center;
    display: flex;
    justify-content: center;
    background-size: cover;
    
}
.container{
 width: 300px;
 min-height: 350px;
 background: #fff;
 border-radius: 5px;
 box-shadow: 0 0 6px rgba(0,0,0,.3);
 padding: 40px 30px;
}
.container .login-text{
    color: #000;
    font-weight: 700;
    text-align: center;
    text-transform: capitalize;
    margin-bottom: 10px;
    display: block;

}
.container .login-details .inputs{
    width: 100%;
    height: 70px;
    border-radius:30px;
    margin-bottom: 15px;
}
.container .login-details .inputs input{
 width: 100%;
 height:50px;
 border: 2px solid wheat;
 font-size: 1 rem;
 border-radius: 40px;
 outline: none;
}

.container .login-details .inputs input:focus, .container .login-details .inputs input:valid{
    border-color: #e84393;

}
.container .login-details .inputs .btn0{
  text-align: center;  
  border: none;
  padding: 10px 10px;
  border-radius: 10px;
  font-size: 1.2rem;
  display: block;
  background: #b2bec3;
  cursor: pointer;
  transition: .3s ease-out;
}
.container .login-details .inputs .btn0:hover{
background: #e84393;
transform:translateY(-5px) ;
}
.login-text{
    color: #2C3A47;
    font-weight: 600;
}
.login-text a{
    color: #82589F;
}
    </style>
</head>
<body>

    <div class="container">
        <form action="" method = "POST" class ="login-details">
            <h5 class="login-text" style="font-size:2rem: font-weight:700;">Signup</h5>
            <div class="inputs">
                <input type ="text" placeholder ="First Name" name= "FirstName" value = "<?php echo $FirstName?>"required >
            </div>
            <div class="inputs">
                <input type ="text" placeholder ="Last Name" name= "LastName" value = "<?php echo $LastName?>"required >
            </div>
            <div class="inputs">
                <input type ="email" placeholder ="Email" name= "Email" value = "<?php echo $Email?>"required >
            </div>
            <div class="inputs">
                <input type ="Password" placeholder ="Password" name= "Password" value = "<?php echo $_POST['Password'] ?>"required >
            </div>
            <div class="input-group">
                        <input type="password" name="conf_pass" placeholder="confirm Password" value="<?php echo $_POST['conf_pass'];?>" required>
                    </div>
            <div class="inputs">
                <button name="submit" class="btn0">Signup</button>
            </div>
            <p class="login-text"> Already have an account? <a href="login.php">Login Here</a></p>
        </form>  
    </div>
</body>
</html>
