<?php
// if(file_exists("buah.txt")){
//     // echo nl2br(file_get_contents("buah.txt")) ;

//     // $isi = file('buah.txt');
//     // echo '<pre>';
//     // print_r($isi);
//     // echo '</pre';

// }else{
//     echo "file tidak ditemukan";
// }

$file = fopen('buah.txt','r');
if (!$file){
    echo 'file tidak ditemukan';
}else{
    // $isi = fread($file,filesize('buah.txt'));
    // $isi = fgets($file);
    while(!feof($file)){
        echo nl2br(fgets($file));
    }
    fclose($file);

}

?>