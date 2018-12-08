<?php
include("functions.php");

$wrongpass = '';
$wronginfo = '<div class="alert alert-danger" role="alert">  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Wrong login detail</div>';

if(isloggedin()==FALSE)
{
}
else
{
header("location:home.php");  
  
}
  
  if(isset($_POST['email']) && ($_POST['pass']))
{

$pass= mysqli_real_escape_string($conn, $_POST['pass']);
$email= mysqli_real_escape_string($conn, $_POST['email']);
$query="SELECT * from users where uemail='$email'";
$result = $conn->query($query);

if ($result->num_rows < 1) 
  {
      $wrongpass = $wronginfo;
  }

 while($row = $result->fetch_assoc()) 
    {
  if(md5($pass)==$row['upass'])
  {
    $_SESSION['logged_in']=TRUE;
    $_SESSION['id']=$row['uid'];
    $_SESSION['unaam']=$row['uname'];
    session_start();
    header("location:home.php");
  }
  else
   {
    $wrongpass = $wronginfo;
   }
    }
  }


?>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   <title>Pence - Register</title>
   <!-- Custom styles for this template-->
   <link href="css/sb-admin.css" rel="stylesheet">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Material Design Bootstrap -->
   <link href="css/mdb.min.css" rel="stylesheet">
   <!-- Your custom styles (optional) -->
   <link href="css/style.css" rel="stylesheet"> 

<script type="text/javascript">
$(document).ready(function(){
$("#name").keyup(function() {
var name = $('#name').val();
if(name=="")
{
$("#disp").html("");
}
else
{
$.ajax({
type: "POST",
url: "check.php",
data: "name="+ name ,
success: function(html){
$("#disp").html(html);
}
});
return false;
}
});
});
</script>
</head>
<body class="bg-dark">

  <div class="view full-page-intro" style="background-image: url('img/home-bg.jpg'); background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an account</div>
      <div class="card-body">

          <form class="form-horizontal" action="index.php" method="post">
              <div class="form-group">
                    <i class="fa fa-user prefix grey-text"></i>
                    <label for="fname"><b>Username</b></label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="fname" name="fname" autocomplete="off" required placeholder="Your Full Name">
                        </div>
             </div>

                <div class="form-group">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label for="name"><b>E-mail ID</b></label>
                    <div class="col-sm-10">
                            <input type="email" id="name" name="name" class="form-control"  autocomplete="off" required placeholder="E-mail">
                            <div id="disp"></div>
                    </div>
                </div>
                <div class="form-group">
                     <i class="fa fa-lock prefix grey-text"></i>
                     <label for="inputPassword3"><b>Password</b></label>
                    <div class="col-sm-10">
                         <input type="password" name="password" class="form-control" id="inputPassword3" required placeholder="Password">
                    </div>
                </div>

              <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

              <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Create My Account</button>
                    </div>
                </div>
        
              <div class="container" style="background-color:#ebebeb">
                <button type="button" onclick="window.location.href='index.php'" class="lgnbtn">Sign In</button>
              </div>
            </form>
<?php

if(isset($_POST['name']) && trim($_POST['password']) != "")
{

$name= mysqli_real_escape_string($conn, $_POST['name']);
$query="SELECT * from users where uemail='$name'";
$result = $conn->query($query);
if ($result->num_rows < 1) 
  {
$uname = mysqli_real_escape_string($conn, $_POST['fname']);
$uname = strip_tags($uname);
$uemail = mysqli_real_escape_string($conn, $_POST['name']);
$uemail = strip_tags($uemail);
$upass = mysqli_real_escape_string($conn, $_POST['password']);
$upass = md5($upass);

$sql = "INSERT INTO users (uname, uemail, upass)
VALUES ('$uname','$uemail','$upass')";
if ($conn->query($sql) === TRUE) 
  {
  echo '<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Congratulations! Your account has been created successfully!
</div>';
  } else 
  {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else
{
   echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> You are already registered. Login using your email-id.
</div>';
}
}
?>
  </div>
  </div>

  </div>
  </div>
  </div>
  </div>  
</div>
</body>
