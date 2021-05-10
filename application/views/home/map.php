<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
	<style>
  	#map {
    	height: 80%;
  	}
  	html, body {
    	height: 100%;
    	margin: 0;
    	padding: 0;
  	}
	</style>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7our79DHQlJivEUM4kPu8DomlMTJOhQM&callback=initMap"></script>
</head>
<body>
	<div id="map"></div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p id="lat"></p>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/w3.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>home.js"></script>
</html>