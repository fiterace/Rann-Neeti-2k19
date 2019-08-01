<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
// initialising  variables

$name="";
$college="";
$event="";
$contact="";
$people="";

//connect to database

$db = mysqli_connect('localhost','root','','rannneeti') or die("could not connect to database");

//Register User
if(isset($_POST['submit']))
{
  $rannid="RANN2k19";
  $name=mysqli_real_escape_string($db,$_POST['name']);
  $email=mysqli_real_escape_string($db,$_POST['email']);
  $college=mysqli_real_escape_string($db,$_POST['college']);
  $event=mysqli_real_escape_string($db,$_POST['event']);
  $teamsize=mysqli_real_escape_string($db,$_POST['people']);
  $contact=mysqli_real_escape_string($db,$_POST['contact']);

  $temp=$event;
  if(strpos($event, "Girls") != "")
  {
    $category = "GIRLS";
    $temp = findfirst($temp);
  }
  else
  {
    if(strpos($event, "Boys") != "")
    {
      $category = "BOYS";
      $temp = findfirst($temp);
    }
    else
    {
      $category = "BOTH";
    }
  }

  //inserting values
  $query = "INSERT INTO ranninfo (rannid,fname , email,mobile , college , teamsize , event , edone,category ) VALUES ('".$rannid."','".$name."','".$email."','".$contact."','".$college."','".$teamsize."','".$temp."','0','".$category."')";
  mysqli_query($db,$query);

  //changing rannid
  $id = mysqli_insert_id($db);
  $length = strlen($id);
  for($x = 1 ; $x <= 4-$length ; $x++)
  {
    $rannid = $rannid."0";
  }
  $rannid = $rannid.$id;
  $sql1 = "UPDATE ranninfo SET rannid='".$rannid."' WHERE id='".$id."'";
  mysqli_query($db,$sql1);

  //emailing
  /*
  $cookiname = "id";
	$cookivalue = $rannid;
	setcookie($cookiname, $cookivalue, time() + (86400 * 30), "/"); // 86400 = 1 day
  require 'C:\xamp\phpMyAdmin\vendor\autoload.php';
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'SSL'; // secure transfer enabled REQUIRED for Gmail
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
	    mysqli_query($db,$sql1);
	}
	else
	{
	   // echo "<script> console.log('Done')</script>";
	    $sql1 = "UPDATE ranninfo SET edone='1' WHERE rannid='".$rannid."'";
	    mysqli_query($db,$sql1);
	}
	echo "<script>window.location = 'success.php';console.log('ss');</script> ";*/
}

function findfirst($data) {
	return explode(' ',trim($data))[0];
}

?>
