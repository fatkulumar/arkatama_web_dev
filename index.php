<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatkul Umar</title>
</head>
<body>

    <div>
        <form action="" method="post">
            <input type="text" name="data" value="FATKUL UMAR 26 KABUPATEN NGAWI">
            <button type="submit" name="simpan">Simpan</button>
        </form>
    </div>
    
</body>
</html>

<?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'db_arkatama');
    if(isset($_POST['simpan'])) {
        $data = $_POST['data'];
        $explode = array_map( 'intval', array_filter( explode(' ', $data), 'is_numeric' ) );
        $explode_data = explode(' ',$data);
        $array_keys =  array_keys($explode);
        $th = 0;
        $age = "";
        $name = "";
        $city = "";
        foreach($array_keys as $val) {
            $th .= $val;
        }

        foreach($explode_data as $key => $value) {
            if($key < $th) {
                $name .= $explode_data[$key] . " ";
            }

            if($key == $th) {
               $age .= $explode_data[$key];
             }

            if($key > $th) {
                $city .= $explode_data[$key];
            }
        }

        $nama =  strtoupper($name);
        $umur =  strtoupper($age) . " ";
        $kota = strtoupper($city);
        $insert = mysqli_query($koneksi, "INSERT INTO `tb_arkatama`(`name`, `age`, `city`) VALUES ('$nama','$umur','$kota')");
    }
?>