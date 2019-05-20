<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stark Emlak - Emlak Danışmanlığı</title>
  <!-- Search Engines -->
  <meta property="og:title" content="Stark Emlak Danışmanlık Hizmetleri  - Hemen Al, Hemen Sat!">
  <meta property="og:description" content="Zengin içerikli emlak sitesi Stark Emlak, bir ev almak, satmak ya da kiralamak istediğinizde size yardımcı olarak doğru kararlar vermenizi sağlar.">
  <meta property="og:image" content="http://www.starkemlak.com">
  <meta property="og:url" content="">
  <!-- Twitter -->
  <meta name="twitter:title" content="Stark Emlak Danışmanlık Hizmetleri">
  <meta name="twitter:description" content="Ev alırken, satarken ya da kiralarken en büyük yardımcınız!">
  <meta name="twitter:name" content="starkemlak">
  <meta name="twitter:card" content="-">
  <!-- file links -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="assets/normalize.css">
  <link rel="stylesheet" type="text/css" href="assets/main.css">
  
</head>
<body>
  <div class="wrapper">
      <div class="container">
        <div class="Header">
          <a href="#">
          <img class="Header-logo" src="src/logo.png" alt="Stark Emlak logosu">
        </a>

       <div class="Header-menu">
            <div class="Header-menu-user">
                <a href="index.php">Anasayfa</a>
				<a href="yonetici_rapor.php">Yönetici Rapor</a>
                
            </div>
            
          </div>
        </div>
        <div class="Main-action">
          <h1>Benim için en uygun ev hangisi?</h1>
          <h4>Sizin için seçilmiş olan evler birkaç tık ötenizde...</h4>
          

          <!-- alternatif form -->
          <!-- 
          <form>
            <input type="text" name="text" class="Main-action-search" placeholder="Kadıköy">
            <input type="submit" name="submit" class="Main-action-submit" value="Ara">
          </form> -->
        </div>
    </header>
    <main style="margin-top:450px;" class="Main-content">
      <p><strong>Stark Emlak,</strong> bir ev almak ya da satmak istediğiniz<br>her zaman yardımcı olmak için burada!</p>
      <div class="Main-content-card">
        <div class="search_content3">
            
            <h2 style="margin-left:-150px">Arama Sonuçları</h2>
  <table border="1" width="600px">
	<thead>
		<tr>
			<th>İlan No</th>
			<th>İlan Tarih</th>
			<th>İlan Fiyat</th>
			<th>Bina Yaşı</th>
			<th>Oda Sayısı</th>
			<th>Bina Kat</th>
			<th>Isıtma</th>
			<th>Küvet</th>
			<th>Asansör</th>
			<th>Kapıcı</th>
			<th>İlan Sahibi</th>
		</tr>
	</thead>
	<tbody>
	<?php
require("baglan.php");
$il= $_GET["il"];
$konut_tur= $_GET["konut"];
$oda= rtrim(ltrim(urlencode($_GET["oda"]),'+'),'+');
$kategori= $_GET["kategori"];


$sql="SELECT DISTINCT i.ilanID,i.ilanTarih,i.ilanFiyat,ilndty.binaYasi,ilndty.odaSayisi,ilndty.binaKat,o.isitma,o.kuvet,o.asansor,o.kapici,k.kimdenAd FROM ilan i,ilandetay ilndty,ozellik o,konut_tur kt,kimden k,kategori ktg where i.ilanID=ilndty.ilanID AND
i.ilanID=o.ilanID and i.kategori_id=ktg.kategoriID and i.kimdenID=k.kimdenID and i.il_id=".$il." and i.konut_tur_id=".$konut_tur." and ilndty.odaSayisi='".$oda."' and i.kategori_id=".$kategori."";
					$result = $conn->query($sql);
							
					while($row = $result->fetch_assoc()) 
					{
    
?>
		<tr>
			<td><?php echo $row["ilanID"];?></td>
			<td><?php echo $row["ilanTarih"];?></td>
			<td><?php echo $row["ilanFiyat"];?></td>
			<td><?php echo $row["binaYasi"];?></td>
			<td><?php echo $row["odaSayisi"];?></td>
			<td><?php echo $row["binaKat"];?></td>
			<td><?php echo $row["isitma"];?></td>
			<td><?php echo $row["kuvet"];?></td>
			<td><?php echo $row["asansor"];?></td>
			<td><?php echo $row["kapici"];?></td>
			<td><?php echo $row["kimdenAd"];?></td>
		</tr>
					<?php }?>		
	</tbody>
</table>
           
        </div>
       </div>
    </main>
    
  
  <footer>
      Stark Emlak, tüm hakları saklıdır.
    </footer>
</body>
<script src="js/main.js"></script>
</html>
