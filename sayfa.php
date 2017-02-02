<?php include "ayar.php";
include "header.php";
 ?>
<main class="home">
	<div class="container">
		<div class="col-md-12"><?php
$veri = $vt->query("select * from blog order by id desc");
while($row = $veri->fetch(PDO::FETCH_ASSOC)){
?>
<aside>		      <?php  	$altdetay = $row['yazi'];
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
				<!-- -->				
			</aside> 

<?php
}
?></div></div></main>
<center><a href="index.php"><input onclick='window.location="index.php";' type="radio"></a>
<a href="sayfa.php"><input type="radio" checked="true"></a>
</center>