<?php
include("../config.php");
if(!isset($_SESSION))
{
	session_start();
}
if(isset($_SESSION['usertype']))
{
	$usertype=$_SESSION['usertype'];
}
else
{
	$usertype="guest";
}
if($usertype=="zone")
{

	$semid=base64_decode($_GET["semid"]);
	$staffid=base64_decode($_GET["staffid"]);
	
	$sql3 = "DELETE FROM seminarparticipant WHERE seminarid='$semid' AND staffid='$staffid'";
	$view = mysqli_query($connection,$sql3)or die("Error in sql3".mysqli_error($connection));
	if($view)
	{
		echo "<script> alert('Successfully delete from Database');window.location.href='index.php'; </script>";
	}
//usertype check end
}
else
{
	header("location:../index.php");
}
?>