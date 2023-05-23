<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("location:../crud-admin/admin.php");
    exit;
}

//--------Conector-To-Database---------
require "../connector/koneksi.php";
//-------------------------------------

$getEmail = "";
$act = "";
$onclick;
if (isset($_GET['email'])) {
    $getEmail = $_GET['email'];
}
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
if ($act == "hapus") {
    $hapus = "DELETE FROM akun WHERE email = '$getEmail' ";
    $query_hapus = mysqli_query($koneksi, $hapus);
}
$page = $_SERVER['PHP_SELF'];
$sec = "15";
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../asset-img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crud-Agen</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        * {
           
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-image: url('../asset-img/background-3.png');
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .mx-auto {
            margin-top: 70px;
            width: 95%;
            font-size: 13px;


        }

        .mx-auto h1 {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        thead {
            font-weight: bold;
        }
        table tr{
            border-bottom: 2px solid #a5d6a7;
            border-right: 2px solid #a5d6a7;
            border-left: 2px solid #a5d6a7;
        }
        .tr-judul {
            vertical-align: middle;
            color: aliceblue;
            border-right: 2px solid seagreen;
            border-left: 2px solid seagreen;
            border-bottom: 2px solid seagreen;

        }
        .table .act {
            width: 10%;
        }

        .table .ctt {
            max-width: 150px;
        }

        .btn {
            width: 100%;
            margin-bottom: 5px;
            font-size: 13px;
            font-weight: bold;
        }

        textarea {
            resize: none;
            width: 100%;
            font-size: 1em;
            font-weight: bold;
            padding-left: 4px;
            padding-right: 4px;
        }

        body {
            background-color: aliceblue;
            /*background-image: url('background-3.png');
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;*/
        }

        .navb {
            background-color: seagreen;
            position: fixed;
            height: 60px;
            width: 100%;
            z-index: 2000;
            margin-top: -70px;


        }

        .navb .logo {
            width: 150px;
            cursor: pointer;
            padding-left: 50px;
            padding-top: 14px;

        }

        .navb ul {
            float: right;
            margin-right: 30px;
            padding-top: 17px;
            padding-bottom: 17px;
            z-index: 2000;

        }

        .navb li {
            margin-right: 5px;

        }

        .navb ul li {
            display: inline-block;

            /*margin: 0 5px;*/
        }

        .navb ul li a {
            color: white;
            font-size: 15px;
            border-radius: 25px;
            padding-top: 2px;
            padding-bottom: 2px;
            padding-right: 12px;
            padding-left: 12px;
            text-transform: uppercase;
            text-decoration: none;
        }

        .navb li a:hover {
            background-color: aliceblue;
            color: seagreen;


            transition: 0.3s;
        }
        .tr-judul {
            vertical-align: middle;
            color: aliceblue;
            height: 50px;

        }
        .checkbtn {
            font-size: 30px;
            color: white;
            float: right;
            line-height: 62px;
            margin-right: 40px;

            cursor: pointer;
            display: none;
        }

        #check {
            display: none;
        }
        .card-header {
            text-align: center;
        }
        @media (max-width: 952px) {
            .mx-auto {
                width: 95%;
            }

            .navb .logo {
                width: 100px;
                padding-left: 50px;
                padding-top: 16px;
            }

            .navb ul li a {
                font-size: 16px;
            }
            .navb .logo{
                width: 150px;
            }

        }

        @media (max-width: 858px) {
            .checkbtn {
                display: block;
            }

            ul {
                position: fixed;
                width: 100%;
                height: 100vh;
                background-color: rgb(28, 41, 33);
                top: 60px;
                left: -100%;
                text-align: center;
                transition: all .5s;
            }

            .navb {
                position: fixed;
            }

            .navb ul li {
                display: block;
                margin: 50px 0;
                line-height: 30px;
            }

            .navb ul li a {
                font-size: 20px;
            }
            
            #check:checked~ul {
                left: 0;
            }
        }
    </style>
</head>

<body>

    <div class="navb">
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <img src="../asset-img/logo-4BEFORE.png" class="logo">
        <ul>
            <li><a href="crud-pesanan.php">pemesanan</a></li>
            <li><a href="crud-agen.php">agen</a></li>
            <li><a href="crud-produk.php">produk</a></li>
            <li><a href="../logout/logout.php" onclick="return confirm('Keluar dari Menu CRUD')"><i class="fa fa-fw fa-user"></i> logout</a></li>

        </ul>
    </div>
    <div class="mx-auto">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
            <h1 class="card-header text-white bg-success"><b>DAFTAR AKUN AGEN</b></h1>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="tr-judul bg-success">
                                <th scope="col">No.</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Nomor Telepon</th>
                                <!--<th scope="col" class="ctt">Catatan</th>-->
                                <th scope="col">Alamat</th>
                                <!--th scope="col">Password</th>-->

                                <th scope="col" class="act">Action</th>
                            <tr>
                        <tbody>
                            <?php
                            $sql = "SELECT*FROM akun ORDER BY nama ASC"; //"SELECT*FROM pesanan ORDER BY id_pesanan DESC";
                            $result = mysqli_query($koneksi, $sql);
                            $urutan = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                $email = $row[0];
                                $nama = $row[1];
                                $jenis_kelamin = $row[2];
                                $no_telepon = $row[3];
                                $alamat = $row[4];
                                $password = $row[5];
                                if ($urutan % 2 != 0) {
                                    $bg = "background-color:#c8e6c9;";
                                } else {
                                    $bg = "";
                                }
                                echo "<tr style=\"".$bg."\">
                                <th scope='row'class='align-middle'>" . $urutan++ . "</th>
                                <th scope='row'class='align-middle'>" . $nama . "</th>
                                <th scope='row'class='align-middle'>" . $email . "</th>
                                <th scope='row'class='align-middle'>" . $jenis_kelamin . "</th>
                                
                                
                                <th scope='row'class='align-middle'> +62-" . $no_telepon . "</th>
                                <th scope='row'class='align-middle'>" . $alamat . "</th>
                                <!--<th scope='row'class='align-middle'>" . $password . "</th>-->
                                <th scope='row' class='act'>
                                <!--<a href='update-agen.php?email=$email'><button type='submit' name='upd' class='btn btn-success'>Edit</button></a><br>-->
                                <a href='crud-agen.php?act=hapus&email=$email'><button type='submit' onclick=\"return confirm('Hapus Akun Agent ?')\" class='btn btn-danger'>Delete</button></a><br>
                                
                                </th>
                                <tr>";
                            }
                            ?>
                        </tbody>
                        <thead>
                    </table>
                    <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
        </div>
    </div>
</body>
<script>

</script>

</html>