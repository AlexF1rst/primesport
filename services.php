<?
include "db/connect.php";

if(isset($_GET['category']))
$result = mysql_query("SELECT * FROM services where category='$_POST[category]'");
else
    $result = mysql_query("SELECT * FROM services");

if (!$result)
{
    echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору. <br> <strong>Код ошибки:</strong></p>";
    exit(mysql_error());
}
?>

<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Prime УСЛУГИ</title>

    <!-- CSS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='assets/css/immersive-slider.css' rel='stylesheet' type='text/css'>
    <link href='assets/css/services.css' rel='stylesheet' type='text/css'>

    <!-- JavaScript -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.immersive-slider.js"></script>




</head>
<body>
  <? include 'modules/header-menu.php'?>
  <div class="wrapper">   
    <div class="main">
      <div class="page_container">
        <div id="immersive_slider">
            <? while($myrow = mysql_fetch_array($result)){?>
          <div class="slide" data-blurred="assets/img/services/b/<?=$myrow['image']?>">
            <div class="content">
              <h2><?=$myrow['title']?></h2>
              <p><?=$myrow['text']?></p>
            </div>
            <div class="image">             
                <img src="assets/img/services/<?=$myrow['image']?>" alt="Slider 1">
            </div>
          </div>
            <?}?>
          <a href="#" class="is-prev">&laquo;</a>
          <a href="#" class="is-next">&raquo;</a>
        </div>
      </div>
  	</div>  	
  	<script type="text/javascript">
  	  $(document).ready( function() {
  	    $("#immersive_slider").immersive_slider({
  	      container: ".main"
  	    });
  	  });

    </script>
  </div>
  <script>
  	var _gaq=[['_setAccount','UA-11278966-1'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
  	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
  	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  	s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>