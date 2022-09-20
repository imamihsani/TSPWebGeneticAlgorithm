<?php
include 'functions.php';
if (empty($_SESSION['login']))
	header("location:login.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="imx.ico" />

	<title>Optimalisasi Rute Pengiriman Barang Kantor Pos Wates</title>
	<link href="assets/css/cerulean-bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/select2.min.css" rel="stylesheet" />
	<link href="assets/css/general.css" rel="stylesheet" />
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYoYWDkkxVBzR-qMaf8zhgZhyBYXGN6bU&language=id&region=ID&libraries=places"></script>
	<script>
		$(document).ready(function() {
			$('.s2').select2();
		});
	</script>
</head>

<body>
	<nav class="navbar navbar-static-top"
				style="background-color: orange;"
	>
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="?" style="color: white;"><span class="glyphicon glyphicon-home"></span></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="?m=kelompok" style="color: white;"><span class="glyphicon glyphicon-align-justify"></span> Kelompok</a></li>
					<li><a href="?m=titik" style="color: white;"><span class="glyphicon glyphicon-th-large"></span> Titik</a></li>
					<!--<a href="?m=bobot" style="color: white;"><span class="glyphicon glyphicon-star"></span> Bobot</a></li>-->
					<li><a href="?m=hitung" style="color: white;"><span class="glyphicon glyphicon-road"></span> Rute</a></li>
					<li><a href="?m=password" style="color: white;"><span class="glyphicon glyphicon-user"></span> Akun</a></li>
					<!--<li><a href="?m=pengaturan" style="color: white;"><span class="glyphicon glyphicon-cog"></span> Pengaturan</a></li>-->
					
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container">
		<?php
		if (file_exists($mod . '.php'))
			include $mod . '.php';
		else
			include 'home.php';
		?>
	</div><br>
	<footer class="footer" style="background-color: orange;">
		<div class="container">
			<p><?= date('Y') ?> IMAM IHSANI<em class="pull-right">183200027</em></p>
		</div>
	</footer>
	<!-- script ini untuk mencari bobot otomatis di tb_bobot, setiap load mengisi 1 titik -->
	<?php
	$row = $db->get_row("SELECT * FROM tb_bobot WHERE ID1<>ID2 ORDER BY updated_at");
	?>
	<script>
		var origin1 = new google.maps.LatLng(<?= implode(',', $LATLING[$row->ID1]) ?>);
		var origin2 = new google.maps.LatLng(<?= implode(',', $LATLING[$row->ID2]) ?>);
		var destinationA = new google.maps.LatLng(<?= implode(',', $LATLING[$row->ID1]) ?>);
		var destinationB = new google.maps.LatLng(<?= implode(',', $LATLING[$row->ID2]) ?>);

		var service = new google.maps.DistanceMatrixService();
		service.getDistanceMatrix({
			origins: [origin1, origin2],
			destinations: [destinationA, destinationB],
			travelMode: 'DRIVING',
			//transitOptions: TransitOptions,
			//drivingOptions: DrivingOptions,
			//unitSystem: UnitSystem,
			//avoidHighways: Boolean,
			//avoidTolls: Boolean,
		}, callback);

		function callback(response, status) {
			console.log(status);
			if (status == 'OK') {
				var jarak1 = response.rows[0].elements[1].distance.value;
				var jarak2 = response.rows[1].elements[0].distance.value;
				var kode1 = '<?= $row->ID1 ?>';
				var kode2 = '<?= $row->ID2 ?>';

				var data = {
					jarak1: jarak1,
					jarak2: jarak2,
					kode1: kode1,
					kode2: kode2,
				}
				$.ajax({
					url: 'ajax.php?m=simpan_bobot',
					data: data,
					type: 'POST',
					success: function(res) {
						console.log(res);
					},
					error: function(err) {
						console.log(err);
					}
				});
			}
		}
	</script>
</body>

</html>