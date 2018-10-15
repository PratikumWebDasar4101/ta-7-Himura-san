<?php
    require("config.php");
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
    </head>
    <body>
        <form action="view.php" method="post">
            Search : <input type="text" name="search" placeholder="Masukkan NIM.."><input type="submit" value="Search">
        </form>
        <br>
        <table border = 1 width="50%" style="text-align: center; border-spacing: 0;">
            <tr>
                <th width="12%">NIM</th>
                <th>Nama</th>
                <th width="12%">Option</th>
            </tr>
            <?php
                @$search = $_POST['search'];
                $query = $pdo -> prepare("SELECT nim, nama FROM tb_mahasiswa WHERE nim LIKE '%$search%'");
                $query -> execute();
                $row = $query -> rowcount();

                while($data = $query -> fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $data['nim'];?></td>
                        <td><?php echo $data['nama'];?></td>
                        <td><a href="edit_data.php?nim=<?php echo $data['nim'];?>">Edit</a> | <a href="proses.php?delete_data=<?php echo $data['nim'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data..?');">Hapus</a></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
        <a href="index.php">Tambah Data</a>
    </body>
</html>