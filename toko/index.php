<!DOCTYPE html>
<html>
<head>
	<title>Pemograman Web</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<style>
 html {
  height: 100%;
}
body{
  font-family: var(--font-style);
  background-image: url(https://img.freepik.com/free-vector/colorful-sport-isometric-poster_1284-15145.jpg?w=740&t=st=1669951725~exp=1669952325~hmac=ee9ff08e618cf90bbbc605ed095099a5868c54360edf901bfea1849760d5972f);
  background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    height: 100%;
}
</style>
<body>
	<div class="container col-md-6 mt-4">
		<h1>Koleksi Alat Olahraga</h1>
		<div class="card">
			<div class="card-header bg-success text-white ">
				Alat Olahraga <a href="tambah.php" class="btn btn-sm btn-primary float-right">Tambah</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Kategori</th>
							<th>Jenis Barang</th>
							<th>Deskripsi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include('koneksi.php'); //memanggil file koneksi
							$datas = mysqli_query($koneksi, "select * from barang") or die(mysqli_error($koneksi));
							//script untuk menampilkan data barang

							$no = 1;//untuk pengurutan nomor

							//melakukan perulangan
							while($row = mysqli_fetch_assoc($datas)) {
						?>	

					<tr>
						<td><?= $no; ?></td>
						<td><?= $row['nama']; //untuk menampilkan nama ?></td>
						<td><?= $row['harga']; ?></td>
						<td><?= $row['deskripsi']; ?></td>
						<td>
								<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
								<a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
						</td>
					</tr>

						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>