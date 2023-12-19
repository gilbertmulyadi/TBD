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
			<CENTER><h2>Data Pelanggan</h2></CENTER>
			<a href="createPelanggan.php" class="btn btn-success">Tambah Mahasiswa</a>
			<?php
				if (isset($_SESSION['success'])) {
					echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
				}
			?>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nama</th>
						<th scope="col">Umur</th>
						<th scope="col">Alamat</th>
						<th scope="col">No Telp</th>
						<th scope="col">Email</th>
					</tr>
				</thead>
				<?php
					require 'config.php';
					$SewaKendaraan = $collection->find();
					foreach ($SewaKendaraan as $sw) {
						echo "<tr>";
						echo "<th scope='row'>".$sw->Nama."</th>";
						echo "<td>".$sw->Umur."</td>";
						echo "<td>".$sw->Alamat."</td>";
						echo "<td>".$sw->No_Telp."</td>";
						echo "<td>".$sw->Email."</td>";
						echo "<td>";
						echo "<a href='editPelanggan.php?id=".$sw->_id."' class='btn btn-primary'>EDIT</a>";
						echo "<a href='hapusPelanggan.php?id=".$sw->_id."' class='btn btn-danger'>HAPUS</a>";
						echo "</td>";
						echo "</tr>";
					}
				?>
			</table>
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
