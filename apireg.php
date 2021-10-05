<?php
$arr = array();
if(isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['dob']) && isset($_GET['city']) && isset($_GET['mobile']))
{
	$fname=$_GET['fname'];
	$lname=$_GET['lname'];
	$dob=$_GET['dob'];
	$city=$_GET['city'];
	$mobile=$_GET['mobile'];
	$con=mysqli_connect('localhost','root','','apitaskdb');
	$sql="insert into user (fname,lname,dob,city,mobile_number)values('$fname','$lname','$dob','$city','$mobile')";
	

	if(mysqli_query($con,$sql))
	{
		$data['status'] = "success";
		$data['msg'] = "Data Inserted Successfully";
		//echo "insert";
		array_push($arr,$data);
	}
	else
	{
		$data['status'] = "Failed";
		$data['msg'] = mysqli_error($con);
		//echo "insert";
		array_push($arr,$data);
	}
}
else{
	$data['status'] = "Failed";
	$data['msg'] = "fname,lname,dob,city or mobile not given";
	//echo "insert";
	array_push($arr,$data);
}
echo json_encode($arr);
?>