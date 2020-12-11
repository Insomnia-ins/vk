<?php session_start(); ?>
<?php

	$connect = mysqli_connect("127.0.0.1","root","","less40");
      
	$text_query = "SELECT * FROM users WHERE email = '{$_POST["log"]}' OR phone = '{$_POST["log"]}' AND password = '{$_POST["pas"]}'";
 	$query = mysqli_query($connect, $text_query);

 	$result = $query->fetch_assoc();

 	if (mysqli_num_rows($query) > 0) {
 		$_SESSION['id'] = $result['id'];
 		header('Location: account.php');
 	}else{
 		header('Location: index.php?warning=ошибка при вводе');
 	}

?>