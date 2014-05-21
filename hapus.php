<?php 
include 'koneksi.php';
$db = new database();
$db->koneksi();

// proses hapus data
if (isset($_GET['aksi'])) {
		if ($_GET['aksi'] == 'hapus') {
		// baca ID dari parameter ID Anggota yang akan dihapus
		$id = $_GET['id_agt'];

		// proses hapus data anggota berdasarkan ID via method
		$db->delete($id);
	}
}

// buat array data anggota dari method tampilAnggota()
$array	= $db->show();
?>
<!doctype HTML>
<html lang = "en">
<body>
<table border='1'>
	<tr>
		<th>No</th>
		<th>Nama PDAM</th>
        <th>Alamat</th>
        <th>telepon</th>
        <th>Faximili</th>
        <th>Email</th>
        <th>Logo</th>
        <th>Edit</th>
    </tr>

<?php
$i = 1;
foreach($array as $data) {
?>

<tr>
	<td><?php echo $i ?></td> 
    <td><?php echo $data['nama'] ?></td>
    <td><?php echo $data['alamat'] ?></td>
    <td><?php echo $data['telepon'] ?></td>
    <td><?php echo $data['faximili'] ?></td>
    <td><?php echo $data['email'] ?></td>
    <td><?php echo $data['logo'] ?></td>
    <td><a href="<?php echo $_SERVER['PHP_SELF'] ?>?aksi=hapus&id_agt=<?php echo $data['id'] ?>">Hapus</a></td>
</tr>

<?php
  $i++;
}	
?>

</table>
</body></html>