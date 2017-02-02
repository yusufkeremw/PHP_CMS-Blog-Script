<?php
session_start();
if($_SESSION["admin"] == "1"){

?>
<?php
include "ayar.php";
$id = $_GET['yazid']; 
if(empty($_POST['yazibaslik']) and empty($_POST['yaziduzenle'])){
}else{
    trim($turan = $_POST['resim']);
    trim($tur = $_POST['yazikat']);
trim($tr = $_POST['yazibaslik']);
trim($tre = $_POST['yaziduzenle']);
$count = $vt->exec("UPDATE blog set baslik = '{$tr}', yazi = '{$tre}', resim='{$turan}', kat = '{$tur}' where id = '{$id}' ");
echo $count . ' tane yazı güncellendi.';
}
?>
<script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta charset="utf-8">
<form action="" method="get">
     <div class="input-group" style="margin-top:15px;">
  <span class="input-group-addon" id="basic-addon1">Düzenlenecek yazının ID'si :</span>
  <input name="yazid" type="text" class="form-control" placeholder="Yazılar Ve ID'lerine Aşağıdaki Kısımdan Bakabilirsiniz." aria-describedby="basic-addon1">
</div>

        <input type="submit" value="Devam Et >>">
</form>
<form action="" method="post">
    <?php 
    $veri = $vt->query("select * from  blog where id = '{$id}'");
while($row = $veri->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="input-group" style="margin-top:15px;">
  <span class="input-group-addon" id="basic-addon1">Başlık : </span><input class="form-control" aria-describedby="basic-addon1" type="text" name="yazibaslik" value="<?php echo $row['baslik']; ?>"><br></div>
    Yazı : <textarea class="ckeditor" name="yaziduzenle"  ><?php echo $row['yazi']; ?></textarea>
    <div class="input-group" style="margin-top:15px;">
  <span class="input-group-addon" id="basic-addon1">Öne Çıkarılmış Görsel :</span><input class="form-control" aria-describedby="basic-addon1" type="text" name="resim" value="<?php echo $row['resim']; ?>"><br></div>
   
   <?php } ?> 		
   
   Yazı Kategoriniz : <select name="yazikat">
			 <option value="" disabled selected hidden>Kategoriyi Seçiniz</option>
     <?php
$veri = $vt->prepare("select * from kategoriler order by id desc limit 10");
          $veri->execute();
          while($row = $veri->fetch(PDO::FETCH_ASSOC)){
          	?>
          	<option value="<?php echo $row['kategori'];?>"><?php echo $row['kategori'];?></option><br/>
    <?php } ?>
    <input style="margin-top:15px;"type="submit" value="Güncelle">
</form>
<center>	<div class="yorumgor" style="background: #212429;color: #fff;font-size: 13px;font-weight: bolder;text-transform: uppercase;padding: 12px 15px;margin-bottom:15px;">Yazılar ve ID'leri :</div></center>
	<?php 
	$veri = $vt->query("select * from  blog order by id");
while($row = $veri->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='s' style='margin-bottom:7px; margin-left:15px;'><li>" .$row['baslik']." -><b> ".$row['id']."</b></li></div>"; 
    }
}else{
    echo "Girişiniz yasaktır.";
}
    ?>