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
	<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=kdsodev;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare("

select kategori.kategoriAD as kategori,count(ilan.ilanID) as kat_sayi from ilan,kategori where kategori.kategoriID=ilan.kategori_id GROUP BY kategori.kategoriAD "); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result as $row){
        array_push($dataPoints, array("label"=> $row->kategori, "y"=> $row->kat_sayi));
    }
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>   
<?php
 
$dataPoints2 = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link2 = new \PDO(   'mysql:host=localhost;dbname=kdsodev;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle2 = $link2->prepare("select odaSayisi as oda_tur,count(ilanID) as oda_sayi from ilandetay GROUP BY oda_tur "); 
    $handle2->execute(); 
    $result2 = $handle2->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result2 as $row2){
        array_push($dataPoints2, array("label"=> $row2->oda_tur, "y"=> $row2->oda_sayi));
    }
	$link2 = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?> 
<?php
 
$dataPoints3 = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link3 = new \PDO(   'mysql:host=localhost;dbname=kdsodev;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle3 = $link3->prepare("select konut_tur.konut_tur_ad as konut_tur, count(ilan.ilanID) as konut_say from ilan,konut_tur where ilan.konut_tur_id=konut_tur.konut_tur_id GROUP BY konut_tur"); 
    $handle3->execute();
    $result3= $handle3->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result3 as $row3){
        array_push($dataPoints3, array("label"=> $row3->konut_tur, "y"=> $row3->konut_say));
    }
	$link3 = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>
    <main style="margin-top:350px;" class="Main-content">
      <p><strong>Stark Emlak,</strong> bir ev almak ya da satmak istediğiniz<br>her zaman yardımcı olmak için burada!</p>
      <div>
        <div class="search_content">
            
            <h2>Yönetici Rapor</h2>
  
	
	              <div id="chartContainer" style="height: 370px; width: 100%;"></div>
				  </div>
				  </div>
				
<div>
        <div class="search_content2">
            
           
  
	
	              
				<div id="chartContainer2" style="height: 370px; width: 100%;"></div>

           
        </div>
       
   
    
  </div>
  <div>
        <div class="search_content2">
            
           
  
	
	              
				<div id="chartContainer3" style="height: 370px; width: 100%;"></div>

           
        </div>
       
   
    
  </div>
           
        </div>
       
    </main>
	
    
      
  <script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Kategorilere Göre İlan Sayısı",
		fontSize:20
	},
	
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 13,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});





 


var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Oda Türüne Göre İlan Sayısı",
		fontSize:20
	},
	
	data: [{
		type: "bar",
		yValueFormatString: "#,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Konut Türüne Göre İlan Sayıları",
		fontSize:20
	},
	axisY: {
		title: "İlan Sayısı",
		fontSize:16
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## soru",
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
chart2.render();
chart3.render();
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <footer>
      Stark Emlak, tüm hakları saklıdır.
    </footer>
</body>
<script src="js/main.js"></script>
</html>
