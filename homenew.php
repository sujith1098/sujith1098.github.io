<?php
include("functions.php");

if(isloggedin()==FALSE)
{
header("location:index.php");  
}
else
{
  
}
$sid=$_SESSION['id'];
?>
<head>
    <title>Pence - Dashboard</title>
    <link href="css/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="img/png" href="img/demo.jpg" />
    <link rel="stylesheet" href="css/css/jquery-ui.css">
    <script src="js/js/jquery-2.1.1.min.js"></script>
    <script src="js/js/jquery-ui.js"></script>
    <script src="js/js/jquery.form.js"></script> 
    <script src="js/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name=viewport content="width=device-width, initial-scale=1">
  <script>

 $(function() {
    $( "#datepicker1" ).datepicker({dateFormat: "dd-mm-yy"});
    $( "#datepicker2" ).datepicker({dateFormat: "dd-mm-yy"});
    $( "#datepicker3" ).datepicker({dateFormat: "dd-mm-yy"});

  });
  </script>

   <script> 
        $(document).ready(function() { 
            $('#myForm').ajaxForm(function() { 
                 alert("Input saved"); 
                 location.href = 'home.php';
            }); 
        }); 
    </script>

  <script>
  $(function() {
    $( "#edetail" ).autocomplete({
      source: 'readxp.php'
    });
  });
  </script>
 

<style>
.circle {
  display: block;
  width: 100px;
  height: 100px;
  margin: 0px 5px 5px 20px;
  background-size: cover;
  background-repeat: no-repeat;
  -webkit-border-radius: 99em;
  -moz-border-radius: 99em;
  border-radius: 99em;
  border: 5px solid #eee;
  box-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);  
}
.red
{
  color: white;
}

.button {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    padding: 5px 10px;
    border: 1px solid #433331;
    border-radius: 8px;
    background: #1c578c;
    text-shadow: #281e1d 1px 1px 1px;
    font: normal normal bold 20px times new roman;
    color: #ffffff;
    float: right;
    text-decoration: none;
}
.button:hover,
.button:focus {
    border: 1px solid ##4f3c3a;
    background: #1c578c;
    background: -webkit-gradient(linear, left top, left bottom, from(#977370), to(#503d3b));
    background: -moz-linear-gradient(top, #977370, #503d3b);
    background: linear-gradient(to bottom, #977370, #503d3b);
    color: #ffffff;
    text-decoration: none;
}
.button:active {
    background: #1c578c;
    background: -webkit-gradient(linear, left top, left bottom, from(#433331), to(#433331));
    background: -moz-linear-gradient(top, #433331, #433331);
    background: linear-gradient(to bottom, #433331, #433331);
}
.button:before{
    content:  "\0000a0";
    display: inline-block;
    height: 24px;
    width: 24px;
    line-height: 24px;
    margin: 0 4px -6px -4px;
    position: relative;
    top: 1px;
    left: 0px;
    background: url("img/sign.png");
    background-size: 100% 100%;
}

.media {
    background: #70beff;
}


</style>
</head>

<?php

$image="img/".$sid.".jpg";

if(file_exists($image))
{
}
else
{
  $image="img/man.png";
} 

?>

<body onLoad="document.showexp.edetail.focus()">
<div class="view full-page-intro" style="background-image: url('img/shark.jpg'); background-repeat: no-repeat; background-size: cover;">

<div style="padding:10px; margin:10px;">
<div class="panel panel-primary">
  <div class="panel-heading"><b></b></div>
  <div class="panel-body">

<div class="media">
<div class="media-left">
<img  class="circle" src="<?php echo $image; ?>">
</div>
<div class="media-body">

<blockquote>
<h4 id="media-heading" class="media-heading"><b><?php    echo $_SESSION['unaam']; ?>'s Dashboard</b></h4> 
<a href='signout.php'  class="button" >Logout</a>
<strong>Savings Balance :</strong> <span class="label label-success">
<?php 
$today = date("Y-m-d");
$dtstart = date("1950-m-d");
$thiyear = date("y-01-01");


$query = "SELECT SUM(tvalue) FROM income WHERE date >= '$dtstart' AND date <= '$today' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$tisum = $psum['SUM(tvalue)']; 
if ($tisum == '')
{echo "No data";}
else
{echo $tisum;}
} 

?></span>
<!-- Today's Expenses Start-->
<br><strong>Today's Expenses :</strong> <span class="label label-danger" id='exptop'><?php 
$query = "SELECT SUM(pprice) FROM expense WHERE date = '$today' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$tesum = $psum['SUM(pprice)']; 
if ($tesum== '')
{echo "No Expense Today";}
else
{echo $tesum;}
} 

?></span>
<!-- Today's Expenses End -->

<br><strong>Total Expenses :</strong> <span class="label label-danger" id='exptop'><?php 
$query = "SELECT SUM(pprice) FROM expense WHERE date >= '$dtstart' AND date <= '$today' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$tesum = $psum['SUM(pprice)']; 
if ($tesum== '')
{echo "No data";}
else
{echo $tesum;}
} 

?></span>



<br><strong>Total Balance :</strong> <span class="label label-default"><?php $rbalance = $tisum - $tesum;
if ($tisum == '')
{echo "No data";}
else
{echo $rbalance;}
?></span></blockquote>

</div>

</div>



<div class="panel panel-info">
<div class="panel-heading"><a href="home.php"><b>Home</b></a>
</div>
<div class="panel-body"> 
<div class="row">
<div>



<div class="col-md-6">

<div class="panel panel-warning">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Add Expenses/Income Detail
  </div>
  <div class="panel-body">

  <form action="home.php" class="form-horizontal"  name="showexp" method="post" id="myForm" >
  <div class="col-lg-8">
      <script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
    return false;
    return true;
}    
</script>
      <input type="text" class="form-control" size="20"  name="entrydate" required placeholder="Choose Date" id="datepicker3" readonly  aria-label="..." value="<?php $thisday = strtotime($today);
    $thisday= date('d-m-Y', $thisday); echo $thisday; ?>">
      <input type="text" class="form-control" size="20" id="edetail"  name="edetail" required placeholder="Enter Detail/Source" title="Please Enter Source"  aria-label="..." autofocus>
      <input type="text" class="form-control" size="20" id="eamount" name="eamount" required placeholder="Enter Amount" aria-label="..." title="Please enter Amount"  onkeypress="return isNumberKey(event)"  >


  <div class="input-group">
      <span class="input-group-addon">Choose Type:
      <label><input type="radio"  name="enttype"  value="1" aria-label="..." checked="">Expense</label>
      <label><input type="radio" name="enttype"   value="2" aria-label="...">Income</label>
      </span>
        <span class="input-group-btn">
        <button  type="submit" class="btn btn-primary" ><b>Save</b>  <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
        </span>
    </div>  
  </form>



<?php
$uid=$sid;
if(isset($_POST["entrydate"]) && trim($_POST["entrydate"]) != "") 
  {

    $entrydate = $_POST["entrydate"];
    $entrydate = strtotime($entrydate);
    $entrydate= date('Y-m-d', $entrydate);
    $enttype = mysqli_real_escape_string($conn, $_POST["enttype"]);
    $edetail = mysqli_real_escape_string($conn,$_POST["edetail"]);
    $eamount = mysqli_real_escape_string($conn, $_POST["eamount"]);
    $edetail = strip_tags($edetail);
    $eamount = strip_tags($eamount);
    $eamount = floatval($eamount);

    if (isset($_POST["enttype"]) && trim($_POST["enttype"]) == "1") 
             
    {
$sql = "INSERT INTO expense (pname, pprice, uid, date )
VALUES ('$edetail','$eamount','$uid','$entrydate')";
if ($conn->query($sql) === TRUE) 
{
  echo "";
} 

else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    }

    elseif (isset($_POST["enttype"]) && trim($_POST["enttype"]) == "2") 
    {
$sql = "INSERT INTO income (income, tvalue, uid, date )
VALUES ('$edetail','$eamount','$uid','$entrydate')";
if ($conn->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    }

  }


?>

    </div>  
  </div>
</div>
 <form id="display">
<select name="incomedetail" onchange="incomerep(this.value)">
  <option value="">Select a Year:</option>
  <option value="2013">2013</option>
  <option value="2014">2014</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
 
</select>
<input type="button"  value="Display All Data" />
</form>  

<div id="responsecontainer"></div>

</div>

  <div class="col-md-6">

<div class="panel panel-warning">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Trace Expense Record
  </div>
  <div class="panel-body">
  <div class="col-lg-8">

  <form action="home.php" class="form-horizontal"  name="showexp" method="post">
              <div class="form-group">
                <div class="input-group form_datetime" >      
                    <input class="form-control" size="60" type="text" value="" name="expdetail" placeholder="Type expense to find" >
                </div>
              </div>

              <div class="form-group">
                <div class="input-group form_datetime" >      
                    <input class="form-control" size="60" type="text" value="<?php $dstart = date("01-m-Y"); echo $dstart; ?>" id="datepicker1" name="startd" readonly placeholder="Start Date" >
                </div>
              </div>
            <div class="form-group">
                <div class="input-group date form_datetime" >
                <input class="form-control" size="50" type="text" value="<?php echo $thisday; ?>" id="datepicker2" name="endd" readonly placeholder="End Date" >
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><b>Show</b> <span class="glyphicon glyphicon-book" aria-hidden="true"></span></button>
      </span>
   </form>
       </div>
</div>
</div>
    


  </div>


<?php

if (!empty($_POST["endd"])) {

$dstart = $_POST['startd'];
$dend = $_POST['endd'];

$dstart = strtotime($dstart);
$dend = strtotime($dend);

$dstart= date('Y-m-d', $dstart);
$dend = date('Y-m-d', $dend);
  }
  else
  {
    $dstart = date("Y-m-01");
    $dend = date("Y-m-d");
  }

$expdetail = '';
$expdetail = mysqli_real_escape_string($conn, $_POST['expdetail']);

$dstartn = strtotime($dstart);
$dstartn = date('d M Y', $dstartn);
$dendn = strtotime($dend);
$dendn = date('d M Y', $dendn);


?>
<table class="table table-hover table-striped table-bordered">
   <caption><h4><span class="glyphicon glyphicon-list" ></span> Expense report from <?php echo $dstartn; ?> to <?php echo $dendn; ?>
   </h4>
<h4><?php 
if (empty($_POST["expdetail"])) {

$query = "SELECT SUM(tvalue) FROM income WHERE date >= '$dstart' AND date <= '$dend' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$isum = $psum['SUM(tvalue)']; 
if ($isum =='')
{
}
else
{
echo 'Income <span class="label label-success">';
echo $isum;
}
} 

?></span>

<?php 

} // end of if empty condition

$query = "SELECT SUM(pprice) FROM expense WHERE date >= '$dstart' AND date <= '$dend' AND uid='$sid' AND pname LIKE '%$expdetail%' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$ppsum = $psum['SUM(pprice)']; 

if ($ppsum !='')
{
echo '<b>'.$expdetail.'</b>  Expenses <span class="label label-danger">'.$ppsum.'</span> ';
}
else {echo ' Expenses <span class="label label-danger">NIL</span>';}
} 

?>
<?php 
if ($isum =='')
{
}
else
{
echo ' Balance <span class="label label-default">';
$btotal = $isum - $ppsum;
echo $btotal;
}


?>
</span>
</h4>
</caption>
<tr class="success"><th>Date</th> <th> Expense Description </th><th> Total Price</th><th>Delete</th></tr>

<?php 

$sql = "SELECT * FROM expense WHERE date >= '$dstart' AND date <= '$dend' AND uid='$sid' AND pname LIKE '%$expdetail%' AND isdel=0 ORDER by date ";

$result = $conn->query($sql);
if ($result->num_rows > 0) 
    {
    while($row = $result->fetch_assoc()) 
    {
      $exdate = strtotime($row["date"]);
      $exdate = date('d M Y', $exdate);
        echo "<tr><td> " . $exdate. "</td> <td> " . $row["pname"]. " </td><td> " . $row["pprice"]. "</td><td> <a href='home.php?del=".$row['id']."' id='del' class='btn btn-danger btn-sm' name='remove' value='remove'><span class='glyphicon glyphicon-remove white' aria-hidden='true'></span></a></td></tr>";
    }
} else {
        echo "<tr><td> </td> <td class='alert alert-danger' role='alert'> No Expense in given Dates </td><td> </td></tr>";
}

 echo "<tr id='totalexp'><td> </td> <td> Total   </td><td id='totexp'>  ".$ppsum." </td></tr>";


?>
</table>
</div>
<?php
 if(isset($_GET['del']))
 {
     $id = (int)$_GET['del'];
     $removeQuery = "UPDATE expense SET isdel='1' Where id=$id AND uid='$sid'";

if (mysqli_query($conn, $removeQuery))
{
    echo "
   <script> 
          alert('Entry Deleted Successfully'); 
          location.href = 'home.php';
    </script>     

    ";
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
</div>
</div>
<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Pence 2018</small>
        </div>
      </div>
    </footer>
</body>


