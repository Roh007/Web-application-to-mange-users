<?php
$con=mysqli_connect('localhost','root','','apitaskdb');
$arr=array();
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql = "delete from user where id=$id";
	if(mysqli_query($con,$sql))
	{
		$data['status']="success";
		$data['msg']="Record Deleted Successfully";
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
	$data['msg'] = "Id not given";
	array_push($arr,$data);
}
echo json_encode($arr);
?>