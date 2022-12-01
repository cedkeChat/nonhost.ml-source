<?php

function rc4($key, $str) {
        $s = array();
        for ($i = 0; $i < 256; $i++) {
                $s[$i] = $i;
        }
        $j = 0;
        for ($i = 0; $i < 256; $i++) {
                $j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
                $x = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $x;
        }
        $i = 0;
        $j = 0;
        $res = '';
        for ($y = 0; $y < strlen($str); $y++) {
                $i = ($i + 1) % 256;
                $j = ($j + $s[$i]) % 256;
                $x = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $x;
                $res .= $str[$y] ^ chr($s[($s[$i] + $s[$j]) % 256]);
        }
        return $res;
}

$handle = fopen("/home/ubuntu/php/1sdq1s2f1d32fqdf1123df15s6485da2", "rb");
if (FALSE === $handle) {
    exit("Echec lors de l'ouverture du flux");
}

$contents = '';



while (!feof($handle)) {
    $contents .= fread($handle, 0x800);
}
fclose($handle);


//Get file type and set it as Content Type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
header('Content-Type: ' . "application/octet-stream");
finfo_close($finfo);

//Use Content-Disposition: attachment to specify the filename
header('Content-Disposition: attachment; filename='.basename("/home/ubuntu/php/1sdq1s2f1d32fqdf1123df15s6485da2"));

//No cache
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

//Define file size
header('Content-Length: ' . filesize("/home/ubuntu/php/1sdq1s2f1d32fqdf1123df15s6485da2"));

$fsize__ = filesize("/home/ubuntu/php/1sdq1s2f1d32fqdf1123df15s6485da2");
echo $contents;
// rc4("XeYjobzW6h", 
?>

