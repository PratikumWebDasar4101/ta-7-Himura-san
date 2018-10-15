<!DOCTYPE html>
<html>
    <head>
        <title>Jurnal</title>
    </head>
    <body>
        <a href="view.php">View Data</a>
        <form action="proses.php?tambah_data=mhs" method="POST">
            NIM : <input type="text" name="nim" pattern="\d*" required><br><br>

            Nama : <input type="text" name="nama" required><br><br>

            Jenis Kelamin : 
            <input type="radio" name="jk" value="Laki-laki"> Laki-laki
            <input type="radio" name="jk" value="Perempuan"> Perempuan <br><br>

            Fakultas : 
            <select name="fakultas" onchange="changeFakultas(this.value)" required>
                <option disabled selected>--- Select One ---</option>
                <option value="FTE">FTE</option>
                <option value="FRI">FRI</option>
                <option value="FIF">FIF</option>
                <option value="FEB">FEB</option>
                <option value="FKB">FKB</option>
                <option value="FIK">FIK</option>
                <option value="FIT">FIT</option>
            </select><br><br>
            Program Studi : 
            <select name="prodi" id="prodi" required>
                <option disabled selected>--- Pilih Fakultas Dahulu ---</option>
            </select><br><br>
            Asal : <input type="text" name="asal"><br><br>
            Motto Hidup : <br><textarea name="motto" cols="30" rows="10"></textarea><br><br>
            <input type="submit" value="Tambah"> | <input type="reset" value="Reset">
        </form>
    </body>
</html>
<script>
    function changeFakultas(value){
        if (value == "FIT") {
            document.getElementById('prodi').innerHTML =
                "<option value='D3 Teknik Komputer'>D3 Teknik Komputer</option>" +
                "<option value='D3 Teknik Informatika'>D3 Teknik Informatika</option>" +
                "<option value='D3 Teknik Telekomunikasi'>D3 Teknik Telekomunikasi</option>" +
                "<option value='D3 Manajemen Pemasaran'>D3 Manajemen Pemasaran</option>" +
                "<option value='D3 Perhotelan'>D3 Perhotelan</option>" +
                "<option value='D3 Manajemen Informatika'>D3 Manajemen Informatika</option>" +
                "<option value='D3 Komputerisasi Komputansi'>D3 Komputerisasi Komputansi</option>" +
                "<option value='D4 Sistem Multimedia'>D4 Sistem Multimedia</option>";
        } else if (value == "FTE"){
            document.getElementById('prodi').innerHTML =
                "<option value='S1 Teknik Elektro'>S1 Teknik Elektro</option>" +
                "<option value='S1 Teknik Telekomunikasi'>S1 Teknik Telekomunikasi</option>" +
                "<option value='S1 Teknik Fisika'>S1 Teknik Fisika</option>" +
                "<option value='S1 Sistem Komputer'>S1 Sistem Komputer</option>" +
                "<option value='S2 Telekomunikasi Elektronik'>S2 Telekomunikasi Elektronik</option>";
        } else if (value == "FRI"){
            document.getElementById('prodi').innerHTML =
                "<option value='S1 Teknik Industri'>S1 Teknik Industri</option>" +
                "<option value='S1 Sistem Informasi'>S1 Sistem Informasi</option>" +
                "<option value='S2 Teknik Industri'>S2 Teknik Industri</option>";
        } else if (value == "FIF"){
            document.getElementById('prodi').innerHTML =
                "<option value='S1 Ilmu Komputasi'>S1 Ilmu Komputasi</option>" +
                "<option value='S1 Informatika'>S1 Informatika</option>" +
                "<option value='S1 Teknologi Informasi'>S1 Teknologi Informasi</option>" +
                "<option value='S2 Informatika'>S2 Informatika</option>";
        } else {
            document.getElementById('prodi').innerHTML = "<option> -- Pilih Fakultas Lain -- </option>";
        }
    };
</script>