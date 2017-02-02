<?php
include('ayar.php');
?>
<!doctype html>
<?php include "header.php"; ?>
<?php 
$sayfa = @intval($_GET['sayfa']);
if(!$sayfa){
	$sayfa = 1;
}
$say = $vt->query("select * from blog");
$toplam = $say->rowCount();
$limit = 9;
$sayfasayi = ceil($toplam/$limit);
if($sayfa > $sayfasayi){
	$sayfa = 1;
}
$goster = $sayfa * $limit - $limit;
$gorunen = 4;
?>
<!--home -->

<main class="home">
	<div class="container">
		<div class="col-md-8">
		
		<?php
$veri = $vt->query("select * from  blog order by id desc limit $goster,2");
while($row = $veri->fetch(PDO::FETCH_ASSOC)){
	$kat = $row['kat'];
                                                                 $detay = $row['yazi'];
                                                                 $uzunluk = strlen($detay);
                                                                 $limits = 74;
                                                                 if ($uzunluk > $limits) {
                                                                 $detay = substr($detay,0,$limits) ."... <font color='blue'>Devamını okumak için tıklayınız.</font>";
                                                                 }
                                                                 $id = $row["id"];
                                                                 ?>
 <aside>			
				<!-- -->
				<div  class="post">
					<h3 class="title"><a href="konu.php?id=<?php echo $id; ?>"><?php echo $row["baslik"]; ?></a></h3>
					<div class="category"><a style="color:white;" href="kategori.php?kat=<?php echo $kat; ?>"><?php echo $row["kat"]; ?></a></div>
					<div class="img" style="background: url('<?php echo $row["resim"]; ?>');background-position: center;"></div>
					<p class="description"><?php echo $detay; ?></p>
				</div>
				<!-- -->				
			</aside> 
          
          <?php
	
}
          ?>
		<?php
		$gosters = $sayfa * $limit - $limit + 2;
$veri = $vt->query("select * from  blog order by id desc limit $gosters,1");
while($row = $veri->fetch(PDO::FETCH_ASSOC)){
	$kat = $row['kat'];
            													$uzundetay = $row['yazi'];
                                                                 $uzunluk = strlen($uzundetay);
                                                                 $limit = 275;
                                                                 if ($uzunluk > $limit) {
                                                                 $uzundetay = substr($uzundetay,0,$limit) ."... <font color='blue'>Devamını okumak için tıklayınız.</font>";
                                                                 }
                                                                 $id = $row["id"];
                                                                 ?> 
		<aside>			
				<!-- -->
				<div  class="post-2">
					<h3 class="title"><a href="konu.php?id=<?php echo $id; ?>"><?php echo $row["baslik"];?></a></h3>
					<div class="category"><a style="color:white;" href="kategori.php?kat=<?php echo $kat; ?>"><?php echo $row["kat"]; ?></a></div>
					<div class="img" style="background: url('<?php echo $row["resim"]; ?>');background-position: center;"></div>					
				<p class="description"><?php echo $uzundetay; ?></p>
				</div>
				<!-- -->				
			</aside>
				<center><div id="banner" style="margin-top:5px;"><img src="http://www.jetrequest.com/advertise/1280934636728x90.gif"></div></center>
			<?php
		}
		?>
			
		</div>
		
	<div class="col-md-4" style="">
			<div id="sidebar">
			
				<!-- -->
				<div class="google-img"></div>	
				<!-- -->
				
				<!-- -->
				<div class="newsletter">Arama Yap</div>
				<div class="newsletter-f">
					<form action="sonuc.php" method="get">
						<input type="text" name="ara" id="mail" required="required">
						<button type="submit" class="netts">Ara</button>
					</form>		
				</div>	
				<!-- -->				
				
				<div class="last-comment-br" style="margin-bottom:5px;">Reklam</div>
<!-- Buraya reklam Kodlarınız Gelecek -->	
<center><img src="http://cthtexas.com/wp-content/uploads/2014/03/336x280-large-Rectangle.gif"></center>
				
			</div>
		</div>
	</div>
</main>

<!--home -->
<main class="home-2" style="margin-top:0px;">
	<div class="container">
	
		<h3 class="w1"></h3>	
		
	
<?php
$gosteri = $sayfa * $limit - $limit + 3;
echo '<div class="col-md-4">';
$veri = $vt->query("select * from  blog order by id desc limit $gosteri,2");
while($row = $veri->fetch(PDO::FETCH_ASSOC)){
	$kat = $row['kat'];
          														$altdetay = $row['yazi'];
                                                                 $uzunluk = strlen($altdetay);
                                                                 $limit = 74;
                                                                 if ($uzunluk > $limit) {
                                                                 $altdetay = substr($altdetay,0,$limit) ."... <font color='blue'>Devamını okumak için tıklayınız.</font>";
                                                                 }
                                                                  $id = $row["id"];
                                                                  ?>
		<div  class="post">
				<h3 class="title"><a href="konu.php?id=<?php echo $id; ?>"><?php echo $row["baslik"]; ?></a></h3>
				<div class="category"><a style="color:white;" href="kategori.php?kat=<?php echo $kat; ?>"><?php echo $row["kat"]; ?></a></div>
				<div class="img" style="background: url('<?php echo $row["resim"]; ?>');background-position: center;"></div>
				<p class="description"><?php echo $altdetay; ?></p>
			</div>
          <?php } ?>
          </div>
	<?php
echo '<div class="col-md-4">';
 $veri = $vt->prepare("select * from blog order by id desc  limit 5,2");
          $veri->execute();
          while($row = $veri->fetch(PDO::FETCH_ASSOC)){
          	$kat = $row['kat'];
          	$altdetay = $row['yazi'];
                                                                 $uzunluk = strlen($altdetay);
                                                                 $limit = 74;
                                                                 if ($uzunluk > $limit) {
                                                                 $altdetay = substr($altdetay,0,$limit) ."... <font color='blue'>Devamını okumak için tıklayınız.</font>";
                                                                 }
		 $id = $row["id"];
		 ?>
		<div  class="post">
				<h3 class="title"><a href="konu.php?id=<?php echo $id; ?>"><?php echo $row["baslik"]; ?></a></h3>
				<div class="category"><a style="color:white;" href="kategori.php?kat=<?php echo $kat; ?>"><?php echo $row['kat']; ?></a></div>
				<div class="img" style="background: url('<?php echo $row["resim"]; ?>');background-position: center;"></div>
				<p class="description"><?php echo $altdetay; ?></p>
			</div>
          <?php
          }
          echo '</div>';
	?>
	<?php
echo '<div class="col-md-4">';
 $veri = $vt->prepare("select * from blog order by id desc  limit 7,2");
          $veri->execute();
          while($row = $veri->fetch(PDO::FETCH_ASSOC)){
          	$altdetay = $row['yazi'];
                                                                 $uzunluk = strlen($altdetay);
                                                                 $limit = 74;
                                                                 if ($uzunluk > $limit) {
                                                                 $altdetay = substr($altdetay,0,$limit) ."... <font color='blue'>Devamını okumak için tıklayınız.</font>";
                                                                 }
                                                                  $id = $row["id"];
		?>
		<div  class="post">
				<h3 class="title"><a href="konu.php?id=<?php echo $id; ?>"><?php echo $row["baslik"]; ?></a></h3>
				<div class="category"><a style="color:white;" href="kategori.php?kat=<?php echo $kat; ?>"><?php echo $row['kat']; ?></a></div>
				<div class="img" style="background: url('<?php echo $row["resim"]; ?>');background-position: center;"></div>
				<p class="description"><?php echo $altdetay; ?></p>
			</div>
          
          <?php
          }
          echo '</div>';
	?>
	
	</div>
</main>
<center><a href="index.php"><input type="radio" checked="true" onclick='window.location="index.php";'></a>
<a href="sayfa.php"><input type="radio" onclick='window.location="sayfa.php";' ></a></center>
<!--footer -->
<footer>
	<div class="container">
		<div class="ftr"></div>
	</div>

	</div>
	</footer>



</body>
</html>
