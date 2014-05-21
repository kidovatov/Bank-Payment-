<?php 
include 'koneksi.php';
$db = new database();
$db->koneksi();

$array = $db->show();	// Masukkan fungsi show() yang ada di dalam file koneksi.php ke dalam $array
?>
<!doctype html>
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
    </tr>

<?php
$i = 1;
foreach($array as $data) {	//lakukan looping terhadap $data yg ada di dalam koneksi.php
?>

<tr>
	<td><?php echo $i ?></td> 
    <td><?php echo $data['nama'] ?></td>
    <td><?php echo $data['alamat'] ?></td>
    <td><?php echo $data['telepon'] ?></td>
    <td><?php echo $data['faximili'] ?></td>
    <td><?php echo $data['email'] ?></td>
    <td><?php echo $data['logo'] ?></td>
</tr>

<?php
  $i++;
}	
?>

</table>
</body></html>