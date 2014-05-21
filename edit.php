<?php 

include 'koneksi.php';
$db = new database();
$db->koneksi();

// proses delete data
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == 'hapus') {
	   // baca ID dari parameter ID Anggota yang akan dihapus
	   $id = $_GET['id_agt'];

	   // proses hapus data anggota berdasarkan ID via method
	   $db->delete($id);	
	}

// proses edit data
	else if ($_GET['aksi'] == 'edit') {
   // baca ID anggota yang akan diedit
	   $id = $_GET['id_agt'];

// menampilkan form edit PDAM pakai method read()
?>

<!doctype HTML>
<html lang = "en">
<body>

<form method="post" action="<?php $_SERVER['PHP_SELF']?>?aksi=update">
<table>
	<tr>
		<td>Nama PDAM</td>
		<td><input type="text" name="nama" 		value="<?php echo $db->read('nama', $id); ?>"></td>
    </tr>
	<tr>
		<td>Alamat</td>
		<td><input type="text" name="alamat" 	value="<?php echo $db->read('alamat', $id); ?>"></td>
    </tr>
	<tr>
		<td>Telepon</td>
		<td><input type="text" name="telepon" 	value="<?php echo $db->read('telepon', $id); ?>"></td>
	</tr>
	<tr>
		<td>Faximili</td>
		<td><input type="text" name="faximili" 	value="<?php echo $db->read('faximili', $id); ?>"></td>
    </tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" 	value="<?php echo $db->read('email', $id); ?>"></td>
    </tr>
	<tr>
		<td>Logo</td>
		<td><input type="text" name="logo" 		value="<?php echo $db->read('logo', $id); ?>"></td>
	</tr>	
</table>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" name="submit" value="Update Data">
</form>

<?php 
	}
	else if ($_GET['aksi'] == 'update') {
		// proses update data anggota
		$id 		= $_POST['id'];
		$nama 		= $_POST['nama'];
		$alamat 	= $_POST['alamat'];
		$telepon 	= $_POST['telepon'];
		$faximili	= $_POST['faximili'];
		$email 		= $_POST['email'];
		$logo 		= $_POST['logo'];

		// update data via method
		$db->update($id, $nama, $alamat, $telepon, $faximili, $email, $logo);
	} 
}

// buat array data anggota dari method show()
$array = $db->show();
?>


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
    <td><a href="<?php echo $_SERVER['PHP_SELF'] ?>?aksi=edit&id_agt=<?php echo $data['id'] ?>">Edit</a> || 
		<a href="<?php echo $_SERVER['PHP_SELF'] ?>?aksi=hapus&id_agt=<?php echo $data['id'] ?>">Hapus</a></td>
</tr>

<?php
  $i++;
}	
?>

</table>
</body></html>