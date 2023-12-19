<!DOCTYPE html>
<html>
<head>
	<title>Sewa Kendaraan</title>
	<link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<style>
		.sidebar {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #111;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 60px;
		}

		.sidebar a {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: #818181;
			display: block;
			transition: 0.3s;
		}

		.sidebar a:hover {
			color: #f1f1f1;
		}

		.sidebar .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
		}

		.openbtn {
			font-size: 20px;
			cursor: pointer;
			background-color: #111;
			color: white;
			padding: 10px 15px;
			border: none;
		}

		.openbtn:hover {
			background-color: #444;
		}

		#main {
			transition: margin-left 0.5s;
			padding: 16px;
		}
	</style>
</head>
<body>
	<div id="mySidebar" class="sidebar">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		<a href="#" onclick="redirectTo('dashboard.php')">Dashboard</a>
		<a href="#" onclick="redirectTo('index.php')">Pelanggan</a>
		<a href="#" onclick="redirectTo('report.php')">Data Penyewaan</a>
		<a href="#" onclick="logout()">Logout</a>
	</div>


	<div id="main">
		<button class="openbtn" onclick="openNav()">☰</button>

		<div class="container">
			<br>
			<CENTER><h2>Selamat Datang di Sewa Kendaraan</h2></CENTER>
		</div>
	</div>

	<script>
		function openNav() {
			document.getElementById("mySidebar").style.width = "250px";
			document.getElementById("main").style.marginLeft = "250px";
		}

		function closeNav() {
			document.getElementById("mySidebar").style.width = "0";
			document.getElementById("main").style.marginLeft= "0";
		}

		function redirectTo(url) {
			window.location.href = url;
		}

		function logout() {
			// Ganti 'login.php' dengan URL logout yang sesuai
			window.location.href = 'login.php';
		}
	</script>
</body>
</html>
