<?php
session_start();
if($_SESSION["admin"] == "1"){

?>
<?php
include "ayar.php";
	$kategori	= $_POST["kategori"];
	$sitekategori = $vt->prepare("INSERT INTO kategoriler SET kategori=?");
	$sitekategori->execute(array($kategori));
	
			$kategoris = $_POST['kategorisil'];
			$kategorisil= $vt->query("delete from kategoriler where kategori= '{$kategoris}'");
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta charset="utf-8">
<form action="" method="POST">
<div class="input-group" style="margin-top:15px; margin-bottom:15px;" >
  <span class="input-group-addon" id="basic-addon1">Eklenecek Kategori :</span>
  <input name="kategori" type="text" class="form-control" placeholder="Buraya Yazınız." aria-describedby="basic-addon1">
</div>
		<input type="submit" value="Gönder">
		</form>
			<center>	<div class="yorumgor" style="background: #43BCD7;color: #fff;font-size: 13px;font-weight: bolder;text-transform: uppercase;padding: 12px 15px;margin-bottom:15px;">Kategori Silmek İçin :</div></center>
			<form action="" method="post">
				<div class="input-group" style="margin-top:15px; margin-bottom:15px;" >
  <span class="input-group-addon" id="basic-addon1">Silinecek Kategori :</span>
  <input name="kategorisil" type="text" class="form-control" placeholder="Unutmayın, Kategoriyi Silmek kategori İçindeki Yazıları Silmez." aria-describedby="basic-addon1">
</div>
  <input type="submit" value="Gönder">
			</form>
			<center>	<div class="yorumgor" style="background: #212429;color: #fff;font-size: 13px;font-weight: bolder;text-transform: uppercase;padding: 12px 15px;margin-bottom:15px;">Bütün Kategoriler :</div></center>
				<?php 
	$veri = $vt->query("select * from  kategoriler order by id");
while($row = $veri->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='s' style='margin-bottom:7px; margin-left:15px;'><li>" .$row['kategori']."</li></div>"; 
    }
}else{
	echo "Girişiniz yasaktır.";
}
    ?>