<?php 
    $koneksi = new mysqli('localhost','root','','skripsi');

    //login
    // if(isset($_POST['login'])){
    //     $user = $_POST['username'];
    //     $pass = $_POST['password'];

    //     $cek = mysqli_query($koneksi,"Select * from tb_pengguna where username='$user' and password='$pass' ");
    //     $hitung = mysqli_num_rows($cek);

    //     if($hitung > 0){
    //         $ambildata = mysqli_fetch_array($cek);
    //         $level = $ambildatalevel['level'];

    //         if($level == 'Admin'){
    //             $_SESSION['log'] = 'Logged';
    //             $_SESSION['level'] = 'admin';
    //             header('location:../admin');
    //         }else{
    //             $_SESSION['log'] = 'Logged';
    //             $_SESSION['level'] = 'ormas';
    //             header('location:../ormas');
    //         }
    //     }else{
    //         echo "<script>
    //         alert('Data anda tidak ditemukan');
    //         document.location='../index.php';
    //     </script>";
    //     }
    // }
?>