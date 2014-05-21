<?php
	class Database {
		private $host	= 'localhost';
		private $user	= 'root';
		private $pswd	= 'apaaja';
		private $dbs	= 'coba';

	public function koneksi() {
		mysql_connect($this->host, $this->user, $this->pswd);
		$dbs = mysql_select_db($this->dbs);
		if ($dbs == TRUE) {
			echo "<h1>Pengaturan Aplikasi</h1>";
		}
	}

	  // method tambah data (insert)	
   function insert($id, $nama, $alamat, $telepon, $faximili, $email, $logo) {
		$query = "INSERT INTO pdam (id, nama, alamat, telepon, faximili, email, logo) 
			VALUES ('', '$nama', '$alamat', '$telepon', '$faximili', '$email', '$logo')";
	    $hasil = mysql_query($query);
	    
	    if ($hasil == TRUE) 
			echo "Data PDAM berhasil disimpan ke database";
				else 
			echo "Data PDAM gagal disimpan ke database";	
	}

   // method tampil data 	
    function show() {
		$query	= mysql_query("SELECT * FROM pdam");
			while($row = mysql_fetch_array($query)) $data[]=$row; // Variabel $data, u/ menampung array dari kueri yg dimasukan ke dalam $row
			return $data; // kembalikan $data
   }

   // method hapus data
   function delete($id_agt) {
	     $query = mysql_query("DELETE FROM pdam WHERE id='$id_agt'");
	     echo "<p>Data Anggota dengan id ".$id_agt." sudah dihapus</p>";
   }

   // method membaca data PDAM 
   function read($field, $id_agt) {
	    $query = "SELECT * FROM pdam WHERE id = '$id_agt'";
	    $hasil = mysql_query($query);
	    $data  = mysql_fetch_array($hasil);
	    
		if 		($field == 'nama') 		return $data['nama'];
	    else if ($field == 'alamat')    return $data['alamat'];
	    else if ($field == 'telepon')   return $data['telepon'];
	    else if ($field == 'faximili')  return $data['faximili'];
	    else if ($field == 'email')     return $data['email'];
	    else if ($field == 'logo')      return $data['logo'];
   }

   // method untuk proses update data PDAM
   function update($id, $nama, $alamat, $telepon, $faximili, $email, $logo) {
	    $query = "UPDATE pdam SET 
			nama = '$nama', alamat = '$alamat', telepon = '$telepon', 
			faximili = '$faximili', email = '$email', logo = '$logo' 
				WHERE id='$id'";
	    mysql_query($query);
		  echo "<p>Data PDAM sudah di update.</p>";	
	}
}