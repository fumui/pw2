<html>
    <body>
        <h1>Input Kategori</h1>
        <form action="aksi_kategori.php" method="post">
            <table>
                <tr>
                    <td>ID Kategori</td>
                    <td><input type="text" name="idkategori"></td>
                </tr>
                <tr>
                    <td>Nama Kategori</td>
                    <td><input type="text" name="namakategori"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Input"></td>
                </tr>
            </table>
        </form>
        
        <h1>Edit Kategori</h1>
        <form action="edit_kategori.php" method="post">
            <table>
                <tr>
                    <td>ID Kategori</td>
                    <td><input type="text" name="idkategori"></td>
                </tr>
                <tr>
                    <td>Nama Kategori</td>
                    <td><input type="text" name="namakategori"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Edit"></td>
                </tr>
            </table>
        </form>
        
        <h1>Hapus Kategori</h1>
        <form action="delete_kategori.php" method="post">
            <table>
                <tr>
                    <td>ID Kategori</td>
                    <td><input type="text" name="idkategori"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Delete"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
