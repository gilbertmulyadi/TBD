<?php
	require_once __DIR__ . "/vendor/autoload.php";
	$collection = (new MongoDB\Client)->SewaKendaraan->pelanggan;
	$report = (new MongoDB\Client)->SewaKendaraan->penyewaan;
?>