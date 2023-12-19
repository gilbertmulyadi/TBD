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
			<CENTER><h2>Data Penyewaan</h2></CENTER>

			<!-- Pencarian berdasarkan jenis kendaraan -->
			<div class="row">
				<div class="col-md-6 offset-md-3 mb-3">
					<input type="text" id="searchInput" class="form-control" placeholder="Cari berdasarkan jenis kendaraan" oninput="searchData()">
				</div>
			</div>

			<!-- Tampilkan total data yang sesuai dengan pencarian -->
			<div id="totalData" class="row">
				<div class="col-md-6 offset-md-3">
					<h4>Total Data: <span id="dataCount"></span></h4>
				</div>
			</div>

			<!-- Tabel Data Penyewaan -->
			<table id="dataTable" class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nama Penyewa</th>
						<th scope="col">Jenis Kendaraan</th>
                        <th scope="col">Brand Kendaraan</th>
						<th scope="col">Tanggal Sewa</th>
					</tr>
				</thead>
				<?php
					require 'config.php';
					$SewaKendaraan = $report->find();
					foreach ($SewaKendaraan as $sewa) {
						echo "<tr>";
						echo "<td>".$sewa->NamaPenyewa."</td>";
						echo "<td>".$sewa->JenisKendaraan."</td>";
                        echo "<td>".$sewa->BrandKendaraan."</td>";
						echo "<td>".$sewa->TanggalSewa."</td>";
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

		function redirectTo(page) {
			window.location.href = page;
		}

        function logout() {
			// Ganti 'login.php' dengan URL logout yang sesuai
			window.location.href = 'login.php';
		}

		function searchData() {
			var input, filter, table, tr, td, i, count;
			input = document.getElementById("searchInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("dataTable");
			tr = table.getElementsByTagName("tr");
			count = 0;

			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1]; // Mengambil kolom jenis kendaraan

				if (td) {
					if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
						count++;
					} else {
						tr[i].style.display = "none";
					}
				}
			}

			// Update total data yang ditampilkan
			document.getElementById("dataCount").innerText = count;
		}
	</script>
</body>
</html>
