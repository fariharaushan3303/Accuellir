<?php 
	session_start();
	$id = $_SESSION['id'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	//echo $id." ".$address." ".$phone;
	$conn = mysqli_connect('localhost', 'root', '', 'project');
	$sql ="UPDATE user SET contact_number ='$phone', address ='$address' WHERE user.uid ='$id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); 
    header('location:profile.php?id='.$id);
?>