<?php
$con=mysqli_connect('localhost','root','','apitaskdb');
$arr=array();
if(isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['dob']) && isset($_GET['city']) && isset($_GET['mobile']))
{
	$id=$_GET['id'];
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$dob=$_GET['dob'];
	$city=$_GET['city'];
	$mobile=$_GET['mobile'];
	
	$sql = "update user set fname='$fname',lname='$lname',dob='$dob',city='$city',mobile_number=$mobile where id=$id";
	if(mysqli_query($con,$sql))
	{
		$data['status']="success";
		$data['msg']="Record Updated Successfully";
		array_push($arr,$data);
	}
	else
	{
		$data['status'] = "Failed";
		$data['msg'] = mysqli_query($con);
		array_push($arr,$data);
	}
}
else
{
	$data['status'] = "Failed";
	$data['msg'] = "id,fname,lname,dob,city or mobile not given";
	array_push($arr,$data);
}
echo json_encode($arr);
?>