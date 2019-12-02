<?php 

	require '../../../control/function.php';

sleep(1);
	
	if(statusProyek($_POST) > 0){
		echo "<script>
					setTimeout(function(argument) {
				        alert('Data Berhasil di Tambah.');
				        document.location.href='{$_SESSION['baseAdmin']}?panel=status';
				    },1000)                    
              </script>
            "; 
        }else{
            echo "<script>
                    alert('Data Gagal di Tambah.');
                  </script>
            "; 
        }  

	// var_dump($_POST);
	// var_dump($_FILES);
 ?>