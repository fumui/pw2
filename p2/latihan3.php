<?php
echo "<b> <font face='tahoma' size=5 color='blue'> Hari ini materi pertama saya membuat web dengan PHP</font></b><br>";

print "<hr size=4 color='red'>";
$nama = "Fuad Mustamirrul Ishlah";
$alamat = "Jl. Pd. Aries No.133, RT.14/RW.04, Setu, Kec. Setu, Kota Tangerang Selatan, Banten 15314";
$email = "fuad.mustamirrul@gmail.com";

echo "Nama saya: $nama <br>"; 
echo "Alamat: $alamat <br>"; 
echo "Email: $email <br>"; 

$a = 10;
$b = 15;
$c = 6;
$hasil = ($a*$b)+2*(pow($c,3))-($b*2*$a);
print "Nilai a = $a <br>";
print "Nilai b = $b <br>";
print "Nilai c = $c <br>";
print "($a*$b)+2*(pow($c,3))-($b*2*$a) = $c <br>";
?>