<?php 

    $host   = "localhost";
    $usr    = "root";
    $pass   = "";
    $dbnm   = "proyek";

    $dbh = mysqli_connect($host, $usr, $pass);

    $db = mysqli_select_db($dbh, $dbnm);

    if(!$db){
        echo "Cek Koneksi. " .mysqli_error($dbh); 
    }