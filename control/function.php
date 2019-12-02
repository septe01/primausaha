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

     function getCount($tbl){
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

    //tampil by id desc
    function tampilByIDOrder($tabel,$field,$Id,$field2){
        global $dbh;
        $query = mysqli_query($dbh,"SELECT * FROM $tabel WHERE $field = '$Id' ORDER BY $field2 DESC ");
        $result = mysqli_fetch_assoc($query);
        return $result;
    }

    function disStatus($table,$field){
        global $dbh;
        $query = mysqli_query($dbh,"SELECT DISTINCT $field FROM $table ");
        $rows = [];
        $rowCOunt = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $rows[] = tampilByIDOrder($table,$field,$row["id_pekerjaan"],"id_status");
            $rowCOunt[] = count(getByLike($table,$field,$row["id_pekerjaan"]));
            
        }
        // var_dump($rowCOunt);
        return [$rows,$rowCOunt];
    }

    function getByLike($table,$field,$like){
        global $dbh;
        $query = mysqli_query($dbh,"SELECT * FROM $table WHERE $field LIKE '%$like%' ORDER BY $field DESC");
        $rows = [];
        while($row = mysqli_fetch_assoc($query)){
           $rows[] = $row;
        }
        return $rows;
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
                $_SESSION['baseAdmin'] = '';
              //kondisi user  
                if($getData["level"] == "owner"){
                    $_SESSION['baseAdmin'] = 'http://localhost/primausaha/view/panel/owner/';
                    header('Location: view/panel/owner');

                }else if($getData["level"] == "manager"){
                    $_SESSION['baseAdmin'] = 'http://localhost/primausaha/view/panel/manager/';
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


    // status proyek
    function statusProyek($data)
    {
        global $dbh; 

        $idPekerjaan = htmlspecialchars($data['proyekId']);
        $upload      = upload();
        $keterangan  = htmlspecialchars($data['keterangan']);
        $date        = date('Y-m-d');



        $result = mysqli_query($dbh,"INSERT INTO status
                    (id_status,id_pekerjaan,gambar,keterangan,tanggal)VALUES
                    (null,'$idPekerjaan','$upload','$keterangan','$date')");
        return mysqli_affected_rows($dbh);
        
    }


    function upload(){

        $name       = $_FILES["upload"]["name"];
        $tmp_name   = $_FILES["upload"]["tmp_name"];
        // var_dump($tmp_name);
        // $error      = $_FILES["upload"]["error"];
        // $size       = $_FILES["upload"]["size"];

        $extensiValid   = ['png','jpg','jpeg'];
        $getExtensi     = explode(".", $name);
        $extensiGambar  = strtolower(end($getExtensi));

        $createNamaFile = 'IMG-'.date('Ymd').substr(rand(), 0, 3).'.'.$extensiGambar;

        // var_dump(getcwd());
        move_uploaded_file($tmp_name, '../../../assets/images/upload/'.$createNamaFile);
        return $createNamaFile;

    }

    function sumData($tabel,$sum,$field,$id){
        global $dbh;
        $query = mysqli_query($dbh,"SELECT SUM($sum) FROM $tabel WHERE $field = $id" );
        $result = mysqli_fetch_assoc($query);
        return $result;

    }

?>