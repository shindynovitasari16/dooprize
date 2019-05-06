<?php 
session_start();
if(isset ($_SESSION["login"])){
    header("Location: index.php");
    exit;
  }
require 'koneksi.php';

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result=mysqli_query($conn , "SELECT *FROM  user WHERE username='$username'");
    if (mysqli_num_rows($result)=== 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"]=true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login locapass</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<style>
	body{
		background-image : url("img/5.jpg");
		background-size: 100%;
	} 
</style>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        

        <h4><p><font color="white">Masuk ke LOKAPASS</font></h4>
        <p><font color="Bisque ">Belum punya akun? </font><a href="register.php">Daftar di sini</a></p>
        <?php if(isset($error)):?>
        <P style="color:red; font-style: italic">username atau password anda salah</P>
        <?php endif;?>
        <form action="" method="post">

            <div class="form-group">
                <label for="username"><font color="white">Username</font></label>
                <input class="form-control" type="text" name="username"  id="Username atau email" />
            </div>


            <div class="form-group">
                <label for="password"><font color="white">Password</font></label>
                <input class="form-control" type="password" name="password" id="Password" />
            </div>

            <button type="submit" class="button-flat btn-block btn-lg" name="login">Login</button>

        </form>
            
        </div>
		<style>
			.button-flat {
				border: 1px solid #801515; 		/*border: tebal[px] tipe[solid,dashed,dotted] warna[#hex, rgb()]; */
				background-color: #801515;		/*ubah warna background */
				color: #FFFFFF;					/*ubah warna font */
				font-size: 16px; 				/*ubah ukuran font */
				padding; 0.5em 1em 0.5em 1em;	/*padding: top right bottom left; */
			}
			button-flat:hover {
				opacity: 0.8; 						/*ubah tingkat transparansi saat cursor menuju button. 0.0 s/d 1.0 */
			}
			button-flat:active { 
				background: #550000;				/*ubah background saat button ditekan */
			}
		</style>

        <div class="col-md-6">
            <!-- isi dengan sesuatu di sini -->
        </div>

    </div>
</div>
    
</body>
</html>
