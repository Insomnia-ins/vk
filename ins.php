<?php 
  session_start();
 ?>
<?php
	$img_dir = 'img/';
	$img_name = $img_dir.basename($_FILES['img']['name']);
	$upload = move_uploaded_file($_FILES['img']['tmp_name'], $img_name);



  	$con = mysqli_connect('127.0.0.1', 'root','', 'less40');

	$text_query =  "SELECT * FROM users WHERE id = {$_SESSION['id']}";

  	$query = mysqli_query($con, $text_query);

  	if ($upload==true) {

		$query = mysqli_query($con,"UPDATE users SET avatar = '{$img_name}' WHERE id = {$_SESSION['id']}");
		# code...
	}
  	$text_zaprosa_vstavit = "UPDATE users SET  password = '{$_POST["pas"]}', email = '{$_POST["ema"]}', phone = '{$_POST["pho"]}', name = '{$_POST["nam"]}', surname = '{$_POST["sur"]}' WHERE id = {$_SESSION['id']}";
            
  $query_insert = mysqli_query($con, $text_zaprosa_vstavit);
  header('Location: account.php');
  


?>
