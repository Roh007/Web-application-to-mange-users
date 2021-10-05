<?php
	$con=mysqli_connect('localhost','root','','apitaskdb');
	$sql = "select * from user";
	$rs = mysqli_query($con,$sql);
	$arr=array();
	if($rs)
	{
		//$status['status']='success';
		//array_push($arr,$status);
		while($rw=mysqli_fetch_row($rs))
		{
			$data['id']=$rw[0];
			$data['fname']=$rw[1];
			$data['lname']=$rw[2];
			$data['dob']=$rw[3];
			$data['city']=$rw[4];
			$data['mobile_number']=$rw[5];
			array_push($arr,$data);
		}
	}
	echo json_encode($arr);
?>