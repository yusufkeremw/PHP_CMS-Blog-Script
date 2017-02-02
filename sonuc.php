<html>
<head>
   
</head>
</html>
<?php
include "ayar.php";
include "header.php";

?>
<div id="aramasonuc" style="background: red;color: #fff;font-size: 13px;font-weight: bolder;text-transform: uppercase;padding: 12px 15px;margin-right: -2px;"><center>Arama Sonuçları :</center></div>
<main class="home">
	<div class="container">
		<div class="col-md-8">
		
 <?php
 $Gelen = $_GET["ara"]; // Kullanıcıdan gelen arama değeri
if(!empty($Gelen)){
$Ara   = $vt->prepare("SELECT * FROM blog WHERE baslik LIKE ? LIMIT 2"); // Arama sorgusu ve limit belirtme
$Ara->execute(array('%'.$Gelen.'%')); // "?" ifadesinin karşılığını belirtme | içerisinde x ifadesini olan verileri temsil eder.

$Liste   = $Ara->fetchAll(PDO::FETCH_ASSOC); // Veri çekmek için kullanılacak olan değişken

if($Ara->rowCount() != "0"){ // Aranan kelimeye göre veri varsa
   
   foreach($Liste as $Bas){
             													$detay = $Bas['yazi'];
                                                                 $uzunluk = strlen($detay);
                                                                 $limit = 75;
                                                                 if ($uzunluk > $limit) {
                                                                 $detay = substr($detay,0,$limit) ."... <font color='blue'>Devamını okumak için içeriğe giriniz.</font>";
                                                                 }
              $id = $Bas["id"];
              echo ' <aside>			
				<!-- -->
				<div  class="post">
					<h3 class="title"><a href="konu.php?id='.$id.'">'.$Bas["baslik"].'</a></h3>
					<div class="category">Startups</div>
					<div class="img"></div>
					<p class="description">'.$detay.'</p>
				</div>
				<!-- -->				
			</aside> ';
          }
}
}
          ?>
					<?php
 $Gelen = $_GET["ara"]; // Kullanıcıdan gelen arama değeri
if(!empty($Gelen)){
$Ara   = $vt->prepare("SELECT * FROM blog WHERE baslik LIKE ? LIMIT 2,1"); // Arama sorgusu ve limit belirtme
$Ara->execute(array('%'.$Gelen.'%')); // "?" ifadesinin karşılığını belirtme | içerisinde x ifadesini olan verileri temsil eder.

$Liste   = $Ara->fetchAll(PDO::FETCH_ASSOC); // Veri çekmek için kullanılacak olan değişken

if($Ara->rowCount() != "0"){ // Aranan kelimeye göre veri varsa
   
   foreach($Liste as $Bas){
       $id = $Bas["id"];
            													$uzundetay = $Bas['yazi'];
                                                                 $uzunluk = strlen($uzundetay);
                                                                 $limit = 275;
                                                                 if ($uzunluk > $limit) {
                                                                 $uzundetay = substr($uzundetay,0,$limit) ."... <font color='blue'>Devamını okumak için içeriğe giriniz.</font>";
                                                                 }	?> <aside>			
				<!-- -->
				<div  class="post-2">
					<h3 class="title"><a href="konu.php?id=<?php echo $id; ?>"><?php echo $Bas["baslik"];?></a></h3>
					<div class="category">Startups</div>
					<div class="img"></div>					
				<p class="description"><?php echo $uzundetay; ?></p>
				</div>
				<!-- -->				
			</aside>
				<center><div id="banner" style="margin-top:5px;"><img src="http://www.jetrequest.com/advertise/1280934636728x90.gif"></div></center>
			<?php
		}
}
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
<center><img src="http://rocksandmineralstrader.com/wp-content/uploads/2012/09/336x280.png"></center>
				
			</div>
		</div>
	</div>
</main>

<!--home -->
<main class="home-2">
	<div class="container">
	
		<h3 class="w1"></h3>	
		
	
<?php
 $Gelen = $_GET["ara"]; // Kullanıcıdan gelen arama değeri
if(!empty($Gelen)){
$Ara   = $vt->prepare("SELECT * FROM blog WHERE baslik LIKE ? LIMIT 3,2"); // Arama sorgusu ve limit belirtme
$Ara->execute(array('%'.$Gelen.'%')); // "?" ifadesinin karşılığını belirtme | içerisinde x ifadesini olan verileri temsil eder.

$Liste   = $Ara->fetchAll(PDO::FETCH_ASSOC); // Veri çekmek için kullanılacak olan değişken

if($Ara->rowCount() != "0"){ // Aranan kelimeye göre veri varsa
   echo '<div class="col-md-4">';
   foreach($Liste as $Bas){
          														$altdetay = $Bas['yazi'];
                                                                 $uzunluk = strlen($altdetay);
                                                                 $limit = 75;
                                                                 if ($uzunluk > $limit) {
                                                                 $altdetay = substr($altdetay,0,$limit) ."... <font color='blue'>Devamını okumak için içeriğe giriniz.</font>";
                                                                 }
                                                                  $id = $Bas["id"];
		echo '
		<div  class="post">
				<h3 class="title"><a href="konu.php?id='.$id.'">'.$Bas["baslik"].'</a></h3>
				<div class="category">Startups</div>
				<div class="img"></div>
				<p class="description">'.$altdetay.'</p>
			</div>';
          }

          echo '</div>';
}
}
	?>
	<?php
 $Gelen = $_GET["ara"]; // Kullanıcıdan gelen arama değeri
if(!empty($Gelen)){
$Ara   = $vt->prepare("SELECT * FROM blog WHERE baslik LIKE ? LIMIT 5,2"); // Arama sorgusu ve limit belirtme
$Ara->execute(array('%'.$Gelen.'%')); // "?" ifadesinin karşılığını belirtme | içerisinde x ifadesini olan verileri temsil eder.

$Liste   = $Ara->fetchAll(PDO::FETCH_ASSOC); // Veri çekmek için kullanılacak olan değişken

if($Ara->rowCount() != "0"){ // Aranan kelimeye göre veri varsa
   echo '<div class="col-md-4">';
   foreach($Liste as $Bas){
          														$altdetay = $Bas['yazi'];
                                                                 $uzunluk = strlen($altdetay);
                                                                 $limit = 75;
                                                                 if ($uzunluk > $limit) {
                                                                 $altdetay = substr($altdetay,0,$limit) ."... <font color='blue'>Devamını okumak için içeriğe giriniz.</font>";
                                                                 }
                                                                  $id = $Bas["id"];
		echo '
		<div  class="post">
				<h3 class="title"><a href="konu.php?id='.$id.'">'.$Bas["baslik"].'</a></h3>
				<div class="category">Startups</div>
				<div class="img"></div>
				<p class="description">'.$altdetay.'</p>
			</div>';
          }

          echo '</div>';
}
}
	?>
<?php
 $Gelen = $_GET["ara"]; // Kullanıcıdan gelen arama değeri
if(!empty($Gelen)){
$Ara   = $vt->prepare("SELECT * FROM blog WHERE baslik LIKE ? LIMIT 7,2"); // Arama sorgusu ve limit belirtme
$Ara->execute(array('%'.$Gelen.'%')); // "?" ifadesinin karşılığını belirtme | içerisinde x ifadesini olan verileri temsil eder.

$Liste   = $Ara->fetchAll(PDO::FETCH_ASSOC); // Veri çekmek için kullanılacak olan değişken

if($Ara->rowCount() != "0"){ // Aranan kelimeye göre veri varsa
   echo '<div class="col-md-4">';
   foreach($Liste as $Bas){
          														$altdetay = $Bas['yazi'];
                                                                 $uzunluk = strlen($altdetay);
                                                                 $limit = 75;
                                                                 if ($uzunluk > $limit) {
                                                                 $altdetay = substr($altdetay,0,$limit) ."... <font color='blue'>Devamını okumak için içeriğe giriniz.</font>";
                                                                 }
                                                                  $id = $Bas["id"];
		echo '
		<div  class="post">
				<h3 class="title"><a href="konu.php?id='.$id.'">'.$Bas["baslik"].'</a></h3>
				<div class="category">Startups</div>
				<div class="img"></div>
				<p class="description">'.$altdetay.'</p>
			</div>';
          }

          echo '</div>';

	?>
	
	</div>
</main>
<?php
}
}
?>
<!--footer -->
<footer>
	<div class="container">
		<div class="ftr"></div>
	</div>
</footer>
</body>
</html>