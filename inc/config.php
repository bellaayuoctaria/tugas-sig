<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "lokasi";

	
   
   $koneksi=mysqli_connect($host,$username,$password,$database)
   or die ('gagal terkoneksi'.mysql_error());
   mysqli_set_charset($koneksi,"utf8");
   $dbase= mysqli_select_db($koneksi,$database)
   or die ('gagal terhubung ke database'.mysql_error());


?>