<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="windows-1251">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" href="./image/favicon.ico" type="image/x-icon">

	<title>Metal Directory</title>
	<style type="text/css">
		a { 
		    text-decoration: none; /* Отменяем подчеркивание у ссылки */
		    color: white;
	   } 
	  	div p a{
	  		color: black;
	  	} 
		table a{
			color: black;
		}
		.black{
			color: black;
		}
	</style>
</head>
<body>
	<nav class="container-fluid">
		<header class="header_bg">
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"><img class="icon" src="./image/icon_.png"></a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="first.php">ГЛАВНАЯ</a></li>
		        <li><a href="index.html">СТРАНИЦА ПРИВЕТСТВИЯ</a></li>
		        <li><a href="info.html">О НАС</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<p class="title">
			главная страница
		</p>
		<p class="title_second">
			на этой странице вы найдете<br> все имеющиеся на сайте<br> виды металлов
		</p>

	</header>
	</nav>
	
	<br>
	<br>
	<div class="container">
	<!--input class="form-control" id="myInput" type="text" placeholder="Search.."-->
	<br><br>
	

	
	<?php
	

	$mysqli = new mysqli("localhost", "root", "", "mySiteDB");

  if ($mysqli->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
    exit();
  }

  $mysqli->set_charset("cp1251");
  $query = "SELECT * FROM material ";

  $result = $mysqli->query($query);
	
	if($result)
	{
		$rows = mysqli_num_rows($result); // количество полученных строк

		echo "<table class=table table-bordered table-striped> <tbody id=myTable>";
		for ($i = 0 ; $i < $rows ; ++$i)
		{
			$row = mysqli_fetch_row($result);
			echo "<tr>";
				for ($j = 1 ; $j < 2 ; ++$j)
					for($k= 0; $k<1; ++$k)
						echo 
							"<td>

								<a href=mat_prop.php?note=$row[$k]>
								<p>$row[$j]</p>
								</a>
							</td>";
			echo "</tr>";
		}
		echo "</tbody></table>";

		// очищаем результат
		mysqli_free_result($result);
	}

	
?>
	</div>	
	
	<br><br>
	<footer class="footer marg">
		<div class="container marg">
			<div class="row">
				<div class="col-sm-6 foot_text">
					Помощь<br>
					+38(066)-124-24-16<br>
					Почта<a href="suport_me@ukr.net"> suport_me@ukr.net </a>					
				</div>
				<div class="col-sm-6 foot_text">
					<a href="first.php">Перейти на главную страницу</a> <br>
					<a href="index.html">Страница приветствия</a> <br>
					<a href="info.html">О нас</a> <br>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<p class="small_text marg">

						Проект выполнен в рамках курсовой работы<br>
						студентки 4 курса Янчук Людмилы<br>
						Авторы фотографий указаны<br>
					</p>
						
					</div>
					
				</div>
			</div>
			
		</div>
		<p >
			<div class="inline-block marg">
				<a href="https://www.whatsapp.com/?lang=ru"><img src="./image/ватс.png" alt="Watsap"></a>
				<a href="mailto:suport_me@ukr.net"><img src="./image/гугл.png" alt="Google"></a>
				<a href="https://www.instagram.com"><img src="./image/инст.png" alt="Instaram"></a>
				<a href="https://twitter.com/login?lang=ru"><img src="./image/твит.png" alt="Twitter"></a>
				<a href="https://www.facebook.com"><img src="./image/фейс.png" alt="Facebook"></a>
			</div>
			
		</p>
	</footer>
	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>	

</body>
</html>