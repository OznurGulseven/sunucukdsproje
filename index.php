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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	

<script>
 $(document).ready(function(){
            $("#ara").click(function(){
				
                var il=$("#il").val();
                var konut_tur=$("#konut_tur").val();
				var oda=$("#oda").val().toString();
                var kategori=$("#kategori").val();				
				
				var form_data = new FormData(); 
				
				
				form_data.append("il", il);
				form_data.append("konut_tur", konut_tur);
				form_data.append("oda", oda);
				form_data.append("kategori", kategori);
				
				if(il!=""){
                $.ajax({
                    url:'sonuc.php',
                    method:'POST',
					cache: false,
					contentType: false,
					processData: false,
                    data:form_data,
					success:function(data){
					
					//window.location="sonuc.php;	
						window.location="sonuc.php?il="+il+" &konut="+konut_tur+" &oda= "+oda+" &kategori= "+kategori;
				   }
				});
				}
				else{
					alert("Lütfen Tüm Alanları Seçiniz..");
				}
				});
                });

</script>
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
          <div class="form-center">
            <div class="Main-action-search">
                <label for="Konum">Konum:</label>
               <?php
					  include("baglan.php");

			$sonuc = mysqli_query($conn,"select * from  il order by il_id");
			if(mysqli_num_rows($sonuc)>0){
			echo '<select id="il" name="account" class="form-control">';
	
			while($oku = mysqli_fetch_assoc($sonuc)){
			
			echo "<option value=".$oku['il_id'].">".$oku['il_ad']."</option>";
				}
    echo '</select>';
			}else{
				echo "Hic kayit yok!";
				} 
				mysqli_close($conn);
				?>
                <label>Konut:</label>
                 <?php
					  include("baglan.php");

			$sonuc = mysqli_query($conn,"select * from konut_tur order by konut_tur_id");
			if(mysqli_num_rows($sonuc)>0){
			echo '<select id="konut_tur" name="account" class="form-control">';
	
			while($oku = mysqli_fetch_assoc($sonuc)){
			
			echo "<option value=".$oku['konut_tur_id'].">".$oku['konut_tur_ad']."</option>";
				}
    echo '</select>';
			}else{
				echo "Hic kayit yok!";
				} 
				mysqli_close($conn);
				?>
                <label>Oda Sayısı:</label>
                <select id="oda" name="odasayisi" id="odasayisi">
                  <option value="3+1" selected>3+1</option>
				  <option value="2+1" selected>2+1</option>
				  <option value="1+1" selected>1+1</option>
				  <option value="1+0" selected>1+0</option>
                  <!-- php -->
                </select>
                <label>Durumu:</label>
               <?php
					  include("baglan.php");

			$sonuc = mysqli_query($conn,"select * from  kategori order by kategoriID");
			if(mysqli_num_rows($sonuc)>0){
			echo '<select id="kategori" name="account" class="form-control">';
	
			while($oku = mysqli_fetch_assoc($sonuc)){
			
			echo "<option value=".$oku['kategoriID'].">".$oku['kategoriAD']."</option>";
				}
    echo '</select>';
			}else{
				echo "Hic kayit yok!";
				} 
				mysqli_close($conn);
				?>
                <input id="ara" class="Main-action-alternate-submit" type="submit" name="gonderbtn" value="Ara">
            </div>
          </div>

          <!-- alternatif form -->
          <!-- 
          <form>
            <input type="text" name="text" class="Main-action-search" placeholder="Kadıköy">
            <input type="submit" name="submit" class="Main-action-submit" value="Ara">
          </form> -->
        </div>
    </header>
    <main class="Main-content">
      <p><strong>Stark Emlak,</strong> bir ev almak ya da satmak istediğiniz<br>her zaman yardımcı olmak için burada!</p>
      <div class="Main-content-card">
        <div class="Main-content-card-item-1">
            <img src="src/sale.png" alt="Satılık ev ikonu">
            <h2>Evimi satmak istiyorum</h2>
            <p>Evimin pazar değeri ne kadardır? Satmak için iyi bir zaman mı? Nasıl bir danışman seçebilirim?</p>
           
        </div>
        <div class="Main-content-card-item-2">
            <img src="src/seller.png" alt="Satılık ev ikonu">
            <h2>Ev almak istiyorum</h2>
            <p>Hayal ettiğim ev ne kadar? Bu ev bu fiyata alınır mı? Bu eve nasıl teklif verebilirim?</p>
            
        </div>
    </main>
    
  </div>
  <footer>
      Stark Emlak, tüm hakları saklıdır.
    </footer>
</body>
<script src="js/main.js"></script>
</html>
