
<?php
include "ayar.php";
$gelenid = $_GET['id'];
$sorgu = $vt->query("SELECT * FROM blog WHERE id = '{$gelenid}'")->fetch(PDO::FETCH_ASSOC);

$konubaslik = $sorgu['baslik'];
$konuyazi = $sorgu['yazi'];
?>

<!doctype html>
<?php include "header.php"; ?>
<!--home -->
<main class="home">
	<div class="container">
	
		<div class="col-md-8">	
		
			<div class="post-content">
				<h1 class="title"><a href="#"><?php echo $konubaslik; ?></a></h1>
				<div class="category"><?php echo $sorgu['kat']; ?></div>
				<div class="img" style="background: url('<?php echo $sorgu['resim']; ?>');height: 140px;width: 100%;background-size: cover;background-position: center;"></div>
				<p class="description"><?php echo $konuyazi; ?><br></p>
			</div>
			
			<div class="user">
				<h3 class="title">Yusuf Kerem Öztürk</h3>
				<div class="img"></div>
				<p class="description">Coder for Web and desktop applications</p>
				<div class="social" style="margin-bottom:10px;"></div>
			</div>
			<center><div id="banner" style="margin-top:5px;"><img src="http://www.jetrequest.com/advertise/1280934636728x90.gif"></div></center>
			</div>
				
				<div class="col-md-8">
					<div></div>
				<center><div class="yorumyeri" style="position:relative;background: #212429;color: #fff;font-size: 13px;font-weight: bolder;text-transform: uppercase;padding: 12px 15px">Yorum Yaz!</div></center>
					<form action="" method="post">
			<input type="text" name="ad" style="width:100%;padding:10px 10px; border-bottom:1px solid #969696;margin-bottom:3px;" placeholder="Adınız"><br>
			<textarea name='yorum' placeholder="Yorumunuz" style="width:100%;padding:10px 10px;border-bottom:1px solid #969696;"></textarea><br>
			<center><input type="submit" value="Gönder" style="padding: 8px 5px;background: #444444;color: #fff;font-size: 13px;margin-top: 5px; margin-bottom:5px;"></center>
			</form><div class="container">
				
				<div class="col-md-4" style="float:right;margin-top:-590px;">
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
			<center>	<div class="yorumgor" style="background: #212429;color: #fff;font-size: 13px;font-weight: bolder;text-transform: uppercase;padding: 12px 15px;margin-bottom:15px;">Önceden Yazılan Yorumlar!</div></center>
		<?php
$yorums = $vt->query("SELECT * FROM yorumlar WHERE yaziid = '{$gelenid}'");
$yorums->execute();
while($bastır = $yorums->fetch(PDO::FETCH_ASSOC)){

?>
<div id="baziyorumlar" style="">
	            <div class="user">
				<h3 class="title"><?php echo $bastır['ad']; ?></h3>
				<div class="img"></div>
				<p class="description"><?php echo htmlspecialchars($bastır['yorum']); ?></p>
				<?php
}
				?>
				<div class="social" style="margin-bottom:10px;"></div>
			</div>
			</div>
			</div>
</div>
</main>
<!--footer -->
<footer>
	<div class="container">
		<div class="ftr"></div>
	</div>
</footer>

                                    
                                    
                                    

</body>
</html>

<?php
$ad = $_POST['ad'];
$yorum = $_POST['yorum'];
$veri = $vt->prepare("insert into yorumlar set ad=?, yorum=?, yaziid=?");
$veri->execute(array($ad, $yorum, $gelenid));
?>