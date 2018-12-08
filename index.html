<?php
include("functions.php");

$wrongpass = '';
$wronginfo = '<div class="alert alert-danger" role="alert">  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Wrong credentials entered</div>';

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
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pence</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">
    
          <!-- Brand -->
          <a class="navbar-brand" href="#">
            <i class="fa fa-calculator" aria-hidden="true"></i>
          </a>
    
          <!-- Collapse -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <!-- Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
            <!-- Left -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Support</a>
              </li>
            </ul>
    
            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link" onclick="document.getElementById('id01').style.display='block'">Sign In</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="regsiter.php">Sign Up</a>
                  </li>
            </ul>
    
          </div>
    
        </div>
      </nav>

<div class="view full-page-intro" style="background-image: url('img/home-bg.jpg'); background-repeat: no-repeat; background-size: cover;">

<div style="height: 70vh">
                <div class="flex-center flex-column">
                    <h1 class="animated fadeIn mb-1"><p class="ex1">Pence</p></h1>        
                    <h5 class="animated fadeIn mb-2"><p class="ex2">Daily Expense Tracker</p></h5>
                </div>
            </div>
        
        <div id="id01" class="modal">
          
          <form class="modal-content animate" action="index.php" method="post">
            <div class="card-header">Log in</div>
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
              <img src="img/man.png" alt="Avatar" class="avatar">
            </div>
        
            <div class="form-group">
              <label for="Email" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-10">
               <input type="email" class="form-control" id="Email" placeholder="Email" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <label for="Password" class="col-sm-3 control-label">Password</label>
               <div class="col-sm-10">
               <input type="password" class="form-control" id="Password" placeholder="Password" name="pass" required>
               </div>
            </div>
            <?php
              echo $wrongpass;
            ?>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" >Sign In</button>
              <label>
                <input type="checkbox" checked="checked" name="remember">
                Remember me
              </label>
             </div>
           </div>
        
            <div class="container" style="background-color:#ebebeb">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <span class="psw"> <a href="forgot-password.html">Forgot your password?</a></span>
            </div>
          </form>
        </div>
        
        <script>
        // Get the modal
        var modal = document.getElementById('id01');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>

        </div>
        

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <div style="height: 05vh">
                <div class="flex-center flex-column">
                    <h9 class="animated fadeIn mb-1"><p class="ex3">© Copyright 2018</p></h9>
                </div>
    </div>

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
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Congratulations! Your account has been created successfully!
</div>';
  } else
  {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else
{
   echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> You are already registered. Login using your email-id.</div>';
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