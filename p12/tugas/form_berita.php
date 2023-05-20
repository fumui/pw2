<html>
    <body>
        <h1>Input Berita</h1>
        <form action="aksi_berita.php" method="post">
            <table>
                <tr>
                    <td>ID Berita</td>
                    <td><input type="text" name="idberita"></td>
                </tr>
                <tr>
                    <td>Kategori Berita</td>
                    <td>
                        <select name="idKategori">
                            <option value="1">Sosial</option>
                            <option value="2">Budaya</option>
                            <option value="3">Teknologi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>judulberita</td>
                    <td><input type="text" name="judulberita"></td>
                </tr>
                <tr>
                    <td>isiberita</td>
                    <td><input type="text" name="isiberita"></td>
                </tr>
                <tr>
                    <td>penulis</td>
                    <td><input type="text" name="penulis"></td>
                </tr>
                <tr>
                    <td>tgl dipublish</td>
                    <td><input type="date" name="tgl"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit"></td>
                </tr>
            </table>
        </form>
        

        <h1>Edit Berita</h1>
        <form action="edit_berita.php" method="post">
            <table>
                <tr>
                    <td>ID Berita</td>
                    <td><input type="text" name="idberita"></td>
                </tr>
                <tr>
                    <td>Kategori Berita</td>
                    <td>
                        <select name="idKategori">
                            <option value="1">Sosial</option>
                            <option value="2">Budaya</option>
                            <option value="3">Teknologi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Judul Berita</td>
                    <td><input type="text" name="judulberita"></td>
                </tr>
                <tr>
                    <td>Isi Berita</td>
                    <td><input type="text" name="isiberita"></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td><input type="text" name="penulis"></td>
                </tr>
                <tr>
                    <td>Tanggal Dipublish</td>
                    <td><input type="date" name="tgl"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Edit"></td>
                </tr>
            </table>
        </form>


        <h1>Hapus Berita</h1>
        <form action="delete_berita.php" method="post">
            <table>
                <tr>
                    <td>ID Berita</td>
                    <td><input type="text" name="idberita"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Delete"></td>
                </tr>
            </table>
        </form>
    
    </body>
</html>
