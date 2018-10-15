<?php
    require("config.php");
    session_start();

    if (isset($_GET['tambah_data'])) {
        if (isset($_POST['nim'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $fakultas = $_POST['fakultas'];
            $prodi = $_POST['prodi'];
            $asal = $_POST['asal'];
            $motto = $_POST['motto'];

            $cek = $pdo -> prepare("SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
            $cek -> execute();
            $row = $cek -> rowcount();
            
            if ($row == 0) {
                $query = $pdo -> prepare("INSERT INTO tb_mahasiswa VALUES ('$nim', '$nama', '$jk', '$fakultas', '$prodi', '$asal', '$motto')");
                $query -> execute();

                if ($query) {
                    ?>
                    <script>
                        alert("Data telah tertambah..!");
                        location = "view.php";
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert("Gagal Menambah Data..!");
                        location = "index.php";
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("NIM sudah terpakai..!!");
                    location = "index.php";
                </script>
                <?php
            }
        }
    }

    if (isset($_GET['edit_data'])) {
        if (isset($_POST['edit'])) {
            $nim = $_GET['edit_data'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $fakultas = $_POST['fakultas'];
            $prodi = $_POST['prodi'];
            $asal = $_POST['asal'];
            $motto = $_POST['motto'];

            $query = $pdo -> prepare("UPDATE tb_mahasiswa SET nama = '$nama', jenis_kelamin = '$jk', fakultas = '$fakultas', prodi = '$prodi', asal = '$asal', motto = '$motto' WHERE nim = '$nim'");
            $query -> execute();

            if ($query) {
                ?>
                <script>
                    alert("Data telah terubah..!");
                    location = "view.php";
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Gagal Mengubah Data..!");
                    location = "index.php";
                </script>
                <?php
            }
        }
    }

    if (isset($_GET['delete_data'])) {
        $nim = $_GET['delete_data'];

        $query = $pdo -> prepare("DELETE FROM tb_mahasiswa WHERE nim = '$nim'");
        $query -> execute();

        if ($query) {
            ?>
            <script>
                alert("Data berhasil terhapus..!");
                location = "view.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data gagal terhapus..!");
                location = "view.php";
            </script>
            <?php
        }
    }
?>