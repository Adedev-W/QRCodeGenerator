<?php

//* * * * * php /sdcard/webProject/Qrcode/file_remv.php
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("H-i-s");
echo "[{$tanggal}] Script running...\r\n";
$daftar_file = glob('tmp/*.png'); 
if(count($daftar_file) > 0) {
	foreach ($daftar_file as $file) {
	    $fileCreationTime = filectime($file);
	    $currentTime = time();
	    $timeDifference = $currentTime - $fileCreationTime;
	
	    if ($timeDifference >= 180) { // Cek jika waktu berbeda lebih dari atau sama dengan 5 menit (5 menit = 300 detik)
	        unlink($file);
	        clearstatcache();
	        echo "File berhasil dihapus.\r\n";
	    } else {
	        echo "Waktu masih kurang dari 5 menit. File tidak dihapus.";
	    }
	}
} else {
	echo "[{$tanggal}] Empty Folders";
}
?>
