<?php 
  session_start();
 ?>
<?php

  $connect = mysqli_connect("127.0.0.1","root","","less40");
  $text_query = "SELECT * FROM users WHERE id={$_SESSION['id']}";
  $query = mysqli_query($connect, $text_query);
  $result = $query->fetch_assoc();

?>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<div style="background-color: ;">
<div  style="background-color: ; width: 50%; margin-left: auto;margin-right: auto; height: 60%; display: flex;" class="shadow p-3 mb-5 bg-white rounded ">
<form style="width: 50%; margin-left: 10%; padding-top: 10%; height: 60%" class="" action="ins.php" method="POST" enctype="multipart/form-data">

          							<div class="form-group">
             
            							<label for="exampleInputName">Имя</label>
            							<input style="width: 70%; height: 8%" type="zag" name="nam" class="form-control" placeholder="" <?php echo "value='".$result["name"]."'"?> >

          							</div>

           							<div class="form-group">
            							<label for="exampleInputEmail1" required="required">Фамилия</label>
            							<input  style="width: 70%; height: 8%" type="op" name="sur" class="form-control" placeholder="" style="height: 70px;" <?php echo "value='".$result["surname"]."'"?>>
          							</div>
           							
          							
          								<div class="form-group mt-3">
           									<label class="mr-2">Загрузить картинку</label>
            								<input type="file" name="img">
          								</div>

                          <div class="form-group" style="background-color: #FFD1D1;">
                          <label for="exampleInputEmail1" required="required">логин</label>
                          <input  style="width: 70%; height: 8%" type="op" name="ema" class="form-control" placeholder="" style="height: 70px;" <?php echo "value='".$result["email"]."'"?>>
                          <label for="exampleInputEmail1" required="required">телефон</label>
                          <input  style="width: 70%; height: 8%" type="op" name="pho" class="form-control" placeholder="" style="height: 70px;" <?php echo "value='".$result["phone"]."'"?>>
                          <label for="exampleInputEmail1" required="required">пароль</label>
                          <input  style="width: 70%; height: 8%" type="op" name="pas" class="form-control" placeholder="" style="height: 70px;" <?php echo "value='".$result["password"]."'"?>>
                        </div>
         							

          				
                  <button type="submit" class="btn btn-outline-dark mt-3">Опубликовать</button>

       			</form>

            
            </div>
</div>