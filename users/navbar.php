<?php
  session_start();
  include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>
  </title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>
<?php
if(isset($_SESSION['login_user'])){
     $r=mysqli_query($db,"SELECT COUNT(status) as total FROM message where status='no' and username='$_SESSION[login_user]' and sender='admin';");
     $c=mysqli_fetch_assoc($r); 

      //............Timer..................
     $b=mysqli_query($db, "SELECT * from request_committee where  username='$_SESSION[login_user]' and approve='Accepted' ORDER BY `paymentdate` ASC limit 0,1;");
      
   }
     ?>
      <nav class="navbar navbar-inverse">
      <div class="container-fluid"> 
          <div class="navbar-header">
            <a class="navbar-brand active">ONLINE COMMITTEE MANAGEMENT SYSTEM</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
           <li><a href="committee.php">COMMITTEES</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
          <?php
            if(isset($_SESSION['login_user']))
            {
             ?>


              <!---------------timer------------------->

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $res['tm']; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "PENDING PAYMENT";
  }
}, 1000);
</script>




              <!---------------timer------------------->

                   <ul class="nav navbar-nav">
                   <li><a href="profile.php">PROFILE</a></li>       

                   </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a><p style="color: #ff1503; font-size: 20px;" id="demo"> </p></a></li>
                    <li><a href="message.php"> <span class="glyphicon-envelope"></span><span class="badge bg-green">
                      <?php echo $c['total'];?>
                    </span> </a></li>
                  <li><a href="">
                    <div style="color: white">
                       <?php
                        echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
                        echo " ".$_SESSION['login_user']; 
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">

                <li><a href="users_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                
                <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
              </ul>
                <?php
            }
          ?>

          
      </div>
    </nav>

     
</body>
</html>