<?php
session_start();

if(!isset($_SESSION['nik'])){
}


?>



<?php

$db = new PDO("mysql:host=localhost;dbname=siswa",'root','');
$query = $db->query("SELECT * FROM tbdatasiswa");
?>
<div class="container-sm">
<table border="1" cellpadding="10" cellspacing="0" class="table-primary table-striped">

<table border="align"="center" width="100%" height="20%"> 
    <td>    
        <table border="1" height="60%" width= "100%" align="center" style="background-color:greenyellow;"> 
            <tr> 
                <style>
                    body{
                        background-image: url("sambo.jpg") ;
                        background-size: cover;
                    }
                    table{
                        background-color:aquamarine;
                    }
                    </style>
                <th>nis</th>
                <th>nama</th>
                <th>kelas</th>
                <form align="right"> 
                <input type="text" name="search"><button type="submit">cari</button>
                </form>
            </tr>
            <?php

            if(isset($_GET['search'])){
                $cari = $_GET['search'];
                $query = $koneksi->query("SELECT * FROM tbdatasiswa WHERE nis AND nama  LIKE '%$cari%'");
            }
            ?>
            <tbody class="table-group-divider bg-info">
                    <?php

                    foreach($query as $querys){
                     
                        echo "<tr>";
                        echo "<td>";
                        echo $querys["nis"];
                        echo "</td>";
                        echo "<td>";
                        echo $querys["nama"];
                        echo "</td>";
                        echo "<td>";
                        echo $querys["kelas"];
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=".$querys["id"]."'class=btn btn-danger'>UPDATE</a> | ";
                        echo "<a href='proses_hapus.php?id=".$querys["id"]."'class=btn btn-danger'>HAPUS</a>";
                        echo "</td>";
                        echo "</td>";
                    }
                    ?>
            </tbody>
             <?php while($data =$query->fetch()) : ?>
             <tr> 
                 <td><?= $data['nis']?></td>
                 <td><?=$data['nama']?></td>
                 <td><?= $data['kelas']?></td>
             </tr>
            <?php endwhile; ?>
        </table>
        <br><br>
        <h4 align="left"><a href ="isi_data.php">ISI DATA</a></h4>
        <h4 align="left"><a href ="index.php">KEMBALI</a></h4>
        
    </td>
    <table>
                