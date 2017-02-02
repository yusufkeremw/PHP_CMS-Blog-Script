  <?php
session_start();
if($_SESSION["admin"] == "1"){

?>
   <?php
   include "ayar.php";
       $yazisil = $_POST['yazisil'];
		$verisil = $vt->query("delete from blog where baslik='$yazisil'");
   ?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<meta charset="utf-8">
    <form action="" method="POST">
		<div class="input-group" style="margin-top:15px;" >
  <span class="input-group-addon" id="basic-addon1">Silinecek Yazı Başlığı :</span>
  <input name="yazisil" type="text" class="form-control" placeholder="Büyük-küçük harflere duyarlıdır." aria-describedby="basic-addon1">
</div><br>
		<input type="submit" value="Gönder">
	</form>
	<center>	<div class="yorumgor" style="background: #212429;color: #fff;font-size: 13px;font-weight: bolder;text-transform: uppercase;padding: 12px 15px;margin-bottom:15px;">Bütün Yazı Başlıkları :</div></center>
	<?php 
	$veri = $vt->query("select * from  blog order by id");
while($row = $veri->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='s' style='margin-bottom:7px; margin-left:15px;'><li>" .$row['baslik']."</li></div>"; 
    }
}else{
    echo "Girişiniz yasaktır.";
}
    ?>