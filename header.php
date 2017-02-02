<html lang="en">
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta charset="UTF-8">
  <title>Blog</title>
  
  <!--styles-->
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"> 
	
</head>
<body>

<!--header -->
<header>
	<div class="navbar">
		<div class="container">
		
			<div class="top">
				<div class="logo"><a href="index.php">Ntblog</a></div>				
				<div class="right">				
					<div class="list-t">
						<nav>
							<ul>
								<li><a href="#">Anasayfa</a></li>
								<li><a href="#">Künye</a></li>
								<li><a href="#">İletişim</a></li>
							</ul>
						</nav>
					</div>
					
					<div class="social-st">
						<p class="social-net">Sosyal Ağlar</p>
						<i class="fa fa-facebook" aria-hidden="true"></i>
						<i class="fa fa-twitter" aria-hidden="true"></i>
						<i class="fa fa-google-plus" aria-hidden="true"></i>
						<i class="fa fa-youtube-play" aria-hidden="true"></i>
					</div>
				</div>				
			</div>
			
			<div class="bottom">
				<div class="list-b">
					<nav>
						<ul><?php
$veri = $vt->prepare("select * from kategoriler order by id desc limit 10");
          $veri->execute();
          while($row = $veri->fetch(PDO::FETCH_ASSOC)){
          	$kat = $row['kategori'];

?>
							<li><a href="kategori.php?kat=<?php echo $kat; ?>"><?php echo $kat; ?></a></li>
							<?php
							  }
							?>

                 		</ul>
					</nav>
				</div>
			</div>	
			
		</div>
	</div>
</header>