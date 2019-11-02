<?php 
    session_start();
    include 'koneksi.php';

    // tambah data
    function tambahData($tabel, $field, $data) {
        global $dbh;   

        $result = mysqli_query($dbh,"INSERT INTO $tabel
                    ($field)VALUES
                    ($data)");
		return mysqli_affected_rows($dbh);
	
    }

    function tampilData($tbl){
        global $dbh;
        
        $rows = [];
        $result = mysqli_query($dbh," SELECT * FROM $tbl ");
        while ($row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function ubahdata($data,  $tabel, $id){
        global $dbh;  
        
        $result = mysqli_query($dbh,"UPDATE $tabel SET $data WHERE $id");
        return mysqli_affected_rows($dbh);
    }

    function hapus($tbl,$key,$data){
        global $dbh;
        $id = $data['id'];        
        $result = mysqli_query($dbh, "DELETE FROM $tbl WHERE $key = $id ");
        return mysqli_affected_rows($dbh);
    }

    //tampil data if not exists

    function tampilIfExist($tabel1, $tabel2, $field)
    {
        global $dbh;
        $result = mysqli_query($dbh, "
                SELECT * FROM $tabel1 WHERE NOT EXISTS (SELECT * FROM $tabel2 WHERE $tabel2.$field = $tabel1.$field )
            ");
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows [] = $row; 
        }
        return $rows;
    }

    //tampil by id
    function tampilByID($tabel,$field,$Id){
        global $dbh;
        $query = mysqli_query($dbh,"SELECT * FROM $tabel WHERE $field = '$Id' ");
        $result = mysqli_fetch_assoc($query);
        return $result;
    }


    // NO Kode
    function kode($field, $tabel)
    {
        global $dbh;
        $result = mysqli_query($dbh,"SELECT MAX($field) as top FROM $tabel");
        $no = mysqli_fetch_assoc($result);
        $nomer =$no['top']+1;
        if($nomer<10){
            $kode = '00'.$nomer;
         }else{ $kode = '0'.$nomer; }

         return $kode;
    }

    // login
    function login($data){
        global $dbh;
        $username   = trim(strtolower($data["username"]));
        $pass       = trim($data["pass"]);

        $getData = tampilByID("user","username","$username");
        if($getData){
            if(password_verify($pass, $getData["password"])){
                $_SESSION["id"] = $getData["id_user"];
                $_SESSION["username"] = $getData["username"];
                $_SESSION["level"] = $getData["level"];
                
                if($getData["level"] == "owner"){
                    header('Location: view/panel/owner');
                }else if($getData["level"] == "manager"){
                    header('Location: view/panel/manager');
                }else{
                    $_SESSION['baseAdmin'] = 'http://localhost/primausaha/view/panel/admin/';
                    header('Location: view/panel/admin');
                }
                
                // header('Location: view/panel/dashboard.php');
            }else{
                echo "<script>
                    alert('Password tidak valid.')
                  </script>";
            }
        }else{
            echo "<script>
                    alert('Username tidak valid.')
                  </script>";
        }
    }

?>