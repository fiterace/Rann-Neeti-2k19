<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register For RannNeeti</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="main">
        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                  <img class="booking-img" src="images/ball.jpg" alt="Booking Image">
                </div>
                <div class="booking-form">
                    <form id="booking-form" action="form.php" method="post">
                        <h2>Booking your Accomodation</h2>
                        <div class="form-group form-input">
                            <input type="text" name="name" id="name" value="" required/>
                            <label for="name" class="form-label">Your name</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="text" name="college" id="college" value="" required />
                            <label for="college" class="form-label">Your college name</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="text" name="email" id="email" value="" required />
                            <label for="email" class="form-label">Your email</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="number" name="contact" id="phone" value="" required />
                            <label for="phone" class="form-label">Your phone number</label>
                        </div>
                        <div class="form-group select-list">
                            <select name="event" id="food" required>
                                    <option value="">Event</option>
                                    <option value="<?php $event="VolleyBall"; ?>">VolleyBall</option>
                                    <option value="BasketBall">BasketBall</option>
                                    <option value="FootBall">FootBall</option>
                                    <option value="Tennis">Tennis</option>
                                    <option value="Badminton">Badminton</option>
                                    <option value="Hockey">Hockey</option>
                                    <option value="Cricket">Cricket</option>
                                    <option value="Chess">Chess</option>
                                    <option value="TableTennis">TableTennis</option>
                            </select>
                        </div>
                        <div class="form-group form-input">
                            <input type="number" name="people" id="people" value="" required />
                            <label for="people" class="form-label">How Many No. Of Participation</label>
                            <br>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Book now" class="submit" id="submit" name="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->

<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>

<!-- PHP -->
<?php include 'server.php'; ? >
<!--?php
$con = mysqli_connect('localhost','root','');
$db = mysqli_select_db($con,'rannneeti');

if(isset($_POST['submit']))
{
  $name=$_POST['uname'];
  $college=$_POST['college'];
  $people=$_POST['people'];
  $contact=$_POST['contact'];
  $query = "INSERT INTO 'participants' ('NAME','COLLEGE','CONTACT','PEOPLE','EVENT') VALUES ('$name','$college','$contact','$people','yeah')";
  $query_run = mysqli_query($con,$query);
  if($query_run)
  {
    echo ' <script type="text/javascript"> alert("Data saved") </script> ';
  }
  else
  {
    echo ' <script type="text/javascript"> alert("Data not saved") </script> ';
  }
}

?-->

<!--?php
$mysql = new mysqli('localhost', 'root', '', 'rannneeti');
if(isset($_POST['submit']))
{
  $stmt = $mysql->prepare( "INSERT INTO participants (NAME,COLLEGE,CONTACT,PEOPLE,EVENT) VALUES (?,?,?,?,?)" );
  $stmt->bind_param( "sssss", $_POST['name'], $_POST['college'], $_POST['contact'], $_POST['people'], "Yeah" );
  // Execute the statement
  $stmt->execute();
  $stmt->close();
  $mysql->close();
}
?-->
<!--?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
		die( "<script> window.location = '/' </script>");
}
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "rannneeti";

// Create connection
$conn = new mysqli($servername, $username, $password , $DBname);

// Check connection
if ($conn->connect_error) {
    echo $conn->connect_error;
	exit;
   // die("<script> window.location = 'error404.html';</script>");
}

$name = $contact = $email = $college = $teamsize = $category = "";
$nameerr = $contacterr = $emailerr = $collegeerr = $teamnameerr = $teamsizeerr = $eventerr = $categoryerr ="";
$games = array("Table-Tennis (Boys)" , "Table-Tennis (Girls)" ,"Badminton (Boys)","Badminton (Girls)","Basketball (Boys)","Basketball (Girls)","Football (Boys)", "Cricket (Boys)" ,"Volleyball (Boys)","Volleyball (Girls)","Hockey (Boys)","Athletics (Boys)","Athletics (Girls)" , "Lawn-Tennis", "Chess");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id;
	$name = test_input($_POST["name"]);
	// echo $name;
	$email = test_input($_POST["email"]);
	$contact = test_input($_POST["contact"]);
	$college = test_input($_POST["college"]);
	$teamsize = test_input($_POST["people"]);
	$char = "a";
	for($i = 0; $i < 15 ; $i++)
	{
		$evento[$i] = test_input($_POST[$char]);
		$char++;
	}
	$rannid = "RANN";
	$counter = 0;
	for($i = 0 ; $i < 15 ; $i++)
	{
		if($evento[$i] == "on")
		{
			$temp = $games[$i];
			if(strpos($games[$i], "Girls") != "")
			{
				$category = "GIRLS";
				$temp = findfirst($temp);
			}
			else
			{
				if(strpos($games[$i], "Boys") != "")
				{
					$category = "BOYS";
					$temp = findfirst($temp);
				}
				else
				{
					$category = "BOTH";
				}
			}

			$sql = "INSERT INTO ranninfo (rannid,fname , email,mobile , college , teamsize , event , edone,category ) VALUES ('".$rannid."','".$name."','".$email."','".$contact."','".$college."','".$teamsize."','".$temp."','0','".$category."')";

			if($conn->query($sql) === FALSE)
			{
				die("<script>window.location = 'error404.html';</script>");
				//die($conn->error);
			}
			else
			{
				if($counter == 0)
				{
					$counter = 1;
					$id = $conn->insert_id;
					$length = strlen($id);
					for($x = 1 ; $x <= 4-$length ; $x++)
					{
						$rannid = $rannid."0";
					}
					$rannid = $rannid.$id;
					$sql1 = "UPDATE ranninfo SET rannid='".$rannid."' WHERE id='".$id."'";
	    			$conn->query($sql1);
				}
			}
		}
	}


	/*$cookiname = "id";
	$cookivalue = $rannid;
	setcookie($cookiname, $cookivalue, time() + (86400 * 30), "/"); // 86400 = 1 day
	require './phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.students.iitmandi.ac.in";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "sports_secretary@students.iitmandi.ac.in";
	$mail->Password = "Rannneeti@2018";
	$mail->SetFrom("sports_secretary@students.iitmandi.ac.in");
	$mail->Subject = "Rann-neeti'19";
	$mail->Body = "you have successfuly registered for the Rann-neeti'18 , your unique team id is "." ".$rannid."\n"."kindly do the payement process for confirming your participation";
	$mail->AddAddress($email);

	if(!$mail->Send())
	{
	    //echo "<script>console.log('Mailer Error: " . $mail->ErrorInfo."')</script>";
	    $sql1 = "UPDATE ranninfo SET edone='0' WHERE rannid=".$rannid."'";
	    $conn->query($sql1);


	}
	else
	{
	   // echo "<script> console.log('Done')</script>";
	    $sql1 = "UPDATE ranninfo SET edone='1' WHERE rannid='".$rannid."'";
	    $conn->query($sql1);
	}
	echo "<script>window.location = 'success.php';console.log('ss');</script> ";
*/
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
function findfirst($data) {
	return explode(' ',trim($data))[0];
}

?-->
</body>
</html>
