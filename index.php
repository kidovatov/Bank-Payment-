<!doctype html>
<html lang = "en">
<head> <title> The First Page </title> </head>
<body>
<?php
	include 'koneksi.php';
	$db = new Database();
	$db->koneksi();

	if (!empty($_POST)){
	$id			= $_POST['id'];
    $nama 		= $_POST['nama'];
	$alamat 	= $_POST['alamat'];
	$telepon 	= $_POST['telepon'];
	$faximili	= $_POST['faximili'];
	$email		= $_POST['email'];
	$logo		= $_POST['logo'];
?>

<form METHOD = "POST" action="<?php $_SERVER['PHP_SELF']?>?aksi=insert">
<table border = "0">
<tr> <td> Nama PDAM </td> 		<td> <input type = "text" name = "nama" required/></td></tr>
<tr> <td> Alamat Kantor </td> 	<td> <input type = "text" name = "alamat" required/></td></tr>
<tr> <td> Telepon </td> 		<td> <input type = "text" name = "telepon" required/></td> </tr>
<tr> <td> Faximili </td> 		<td> <input type = "text" name = "faximili" required/></td> </tr>
<tr> <td> Email </td> 			<td> <input type = "text" name = "email" required/></td> </tr>
<tr> <td> Logo </td> 			<td> <input type = "text" name = "logo" required/> </td> </tr>
<tr> <td colspan = "2"> 
	<input type="hidden" name="id" value="<?php echo $id; ?>"> 
	<input type = "submit" value = "Simpan" /> </td> </tr>
</table>
</form>

<?php
	$db->insert($id, $nama, $alamat, $telepon, $faximili, $email, $logo);
  }
?>

</body>
</html>