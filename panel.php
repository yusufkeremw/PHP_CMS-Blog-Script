<?php ob_start();
header("Content-type:text/html;charset=utf-8");
class bilisimturk{


public static function yetki($x,$y){



 if(empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != "$x" || $_SERVER['PHP_AUTH_PW'] != "$y") {
header('WWW-Authenticate: Basic realm="Kullanici adi ve sifreyi giriniz."');
 die('Yetkiniz yok');

}}



}
$kadi="admin";
$sifre="admin";
bilisimturk::yetki($kadi,$sifre);
?> 
<?php
session_start();
$_SESSION["admin"] = "1";
include "ayar.php";
	if($_POST) {
		$baslik = $_POST["baslik"];
		$yazi = $_POST["yazi"];
		$yazikat = $_POST['yazikat'];
		$resim = $_POST['resim'];
			$veri = $vt->prepare("insert into blog set baslik=?, yazi=?, kat=?, resim=?");
			$veri->execute(array($baslik, $yazi, $yazikat, $resim));
    if($veri){
echo "<font size='2' color='green'>İşleminiz Başarıyla Tamamlandı. </font>";
header("refresh: 5; url=panel.php");
    }else{
echo "<font size='2' color='red'>İşleminiz Maalesef Tamamlanamadı. </font>";
header("refresh: 5; url=panel.php");
    }

	}
	$baslikt = $_POST["baslikt"];
		$sitebaslik = $vt->prepare("insert into sitebaslik set baslik=?");
		$sitebaslik->execute(array($baslikt));
?>
<html>
<head>
<title>Admin Paneli</title>
<link ref="stylesheet" href="css/style.css">
<meta charset="utf-8">
<script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="margin-right:30%;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="İndex.php">Anasayfa</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <li class="active"><a href="panel.php">Yazı Ekle<span class="sr-only">(current)</span></a></li>
        <li><a href="panelpage/yazisil.php">Yazı Sil</a></li>
        <li><a href="panelpage/yaziduzenle.php">Yazı Düzenle</a></li>
        <li><a href="panelpage/yenikategori.php">Yeni Kategori Ekle</a></li>
         <li><a href="panelpage/cikisyap.php">Çıkış Yap</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
	
	
	
	
	
	<!-- HTML -->
    <form action="" method="POST">
		<center><div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Yazı başlığı :</span>
  <input type="text" name ="baslik" class="form-control" placeholder="Başlık" aria-describedby="basic-addon1">
</div>
</center><br>
		Yazınız:<textarea name="yazi" class="ckeditor"> </textarea><br>
		Yazı Kategoriniz : <select name="yazikat">
			 <option value="" disabled selected hidden>Kategoriyi Seçiniz</option>
     <?php
$veri = $vt->prepare("select * from kategoriler order by id desc limit 10");
          $veri->execute();
          while($row = $veri->fetch(PDO::FETCH_ASSOC)){
          	?>
          	<option value="<?php echo $row['kategori'];?>"><?php echo $row['kategori'];?></option><br/>
     <?php } ?><br>
     <div class="input-group" style="margin-top:15px;">
  <span class="input-group-addon" id="basic-addon1">Öne Çıkarılmış Görsel :</span>
  <input type="text" name ="resim" class="form-control" placeholder="Görselin URL'sini yapıştırınız." aria-describedby="basic-addon1">
</div>
		<input type="submit" value="Gönder">
	</form></br>


</body>
</html>
