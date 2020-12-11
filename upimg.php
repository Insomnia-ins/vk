<?php
	$img_dir = 'img/';
	$img_name = $img_dir.basename($_FILES['img']['name']);
	$upload = move_uploaded_file($_FILES['img']['tmp_name'], $img_name);
	$con = mysqli_connect('127.0.0.1','root','','less40');
	if ($upload==true) {

		$query = mysqli_query($con,"UPDATE users SET avatar = '{$img_name}' WHERE id = {$_SESSION['id']}");
		# code...
	}
?>