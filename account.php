<?php 
	session_start();
 ?>
<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<meta charset="utf-8">
 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 	<style type="text/css">
 		.search-input{
			border-radius: 15px;
			border:none;
			padding-top: 5px;
			padding-bottom: 5px;
			padding-left: 10px;		
			background: #224b7a;
			color: white;
			outline: none;
			width: 250px;
		}
		.butleft{
			background-color: $light;

		}
		.butleft:hover{

			background-color: #ECF2F4;
		}
		.font{
			font-size: 15px;
			 color: #4680C2;
		}
		.input::placeholder {
  			color: white;
		}
 	</style>
 </head>
 <body class="bg-light">
<?php

	$connect = mysqli_connect("127.0.0.1","root","","less40");
	$text_query = "SELECT * FROM users WHERE id={$_SESSION['id']}";
 	$query = mysqli_query($connect, $text_query);
 	$result = $query->fetch_assoc();
 	$text_query2 = " 
  			SELECT *
  			FROM posts
  			INNER JOIN 
  			users ON users.id = posts.nameid WHERE users.id = '{$_SESSION['id']}'";

  	$query2 = mysqli_query($connect, $text_query2);
 	
?>

<div class="col-12" style="background-color: #4680C2">
	<div class="col-8 mx-auto">
		<div class="row">
			<div class="col-2">
				<img src="img/vk.png" class="w-25">
			</div>
			<div class="col-8">
				<input class="mt-1 search-input" placeholder="Поиск" style="color:;" >
			</div>
		</div>
	</div>
</div>

<div class="col-8 mx-auto mt-4">
	<div class="row">
		<div class="col-2">
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Моя страница</p></div>
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Новости</p></div>
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Мессенджер</p></div>
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Друзья</p></div>
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Сообщества</p></div>
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Фотографии</p></div>
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Музыка</p></div>
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Видео</p></div>
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Клипы</p></div>
			<div class="col-12 butleft " style="height: 25px; margin-top: 5px;"><p style="" class="font">Игры</p></div>
		</div>
		<div class="col-3 text-center bg-white ">
			<div>
				<img src="<?php echo $result['avatar'] ?>" class="w-100 img">
				<div style="background-color: rgba(0,0,0,0.7)">
					<p data-toggle="modal" data-target="#exampleModal" class="text-white update">Обновить фотографию</p>
				</div>
			</div>
			
			<form method="POST" action="admin.php">
				<button class="btn btn-primary mt-3">Редактировать</button>
			</form>
			
		</div>
		<div class="col-6 pt-3 bg-white ml-2">
			<div class="col-12 border-bottom" >
				<h5><?php echo $result['name']; echo " " ; echo $result['surname']; ?></h5>
				<p class="text-secondary">Изменить статус</p>
			</div>
			<div class="col-12 border-bottom" >
				
				<p class="font">Город: <?php echo "  " ; echo $result['city']; ?></p>
				<p class="font">Образование: <?php echo "  " ; echo $result['education']; ?></p>
				<p class="font">День рождения: --.--.-- </p>
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-2">
			
		</div>
		<div class="col-3 text-center bg-white ">
			<div>
				
			</div>
			
			
			
		</div>
		<div class="col-6 pt-3 bg-white ml-2">
			<div class="col-12 border-bottom" >

				<p class="text-secondary">Посты</p>
			</div>
			<div class="col-12 border-bottom" >
				
				<?php 
            
                    for($i=0;$i<$query2->num_rows;$i++){
                    $result2 = $query2->fetch_assoc(); 
            
                ?> 
                <div class=" mt-5">
                    
                    <div class="col-8">
                        <img <?php echo "src='".$result2["img"]."'";?> class="w-100">
                    </div>
                    <div class="col-4 mt-2">
                        <?php
                            echo "<h5 >".$result2["title"]."</h5>";
                        ?>                        
                    </div>
                    
                    <div class="col-2 mt-2">
                   
                   
                        
                    </div>
                    
                </div>
                <?php } ?>
              
            
                    
           
                 
                
			</div>
		</div>
	</div>
</div>

<!--модальное окно-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Загрузка новой фотографии</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p>Друзьям будет проще узнать Вас, если Вы загрузите свою настоящую фотографию.
		Вы можете загрузить изображение в формате JPG, GIF или PNG.</p>
		<form method="POST" action="upimg.php" enctype="multipart/form-data">	
			<input type="file" name="img"  placeholder="Выбрать файл">
			<button class="btn btn-primary mt-3" type="submit">Сохранить и продолжить</button>
		</form>
		
      </div>
      <div class="modal-footer">
        
        <p>Если у Вас возникают проблемы с загрузкой, попробуйте выбрать фотографию меньшего размера.</p>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

 </body>
 </html>