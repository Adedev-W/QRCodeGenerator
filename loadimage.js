
function triggermage(filepath) {
	const button = document.getElementById('imgdwn');
	button.addEventListener('click', function() {
	  // Ganti dengan path file lokal yang ingin Anda unduh
	  const filePath = filepath; 
	  // Buat elemen <a> untuk mengunduh file
	  const link = document.createElement('a');
	  link.href = filePath;
	  var fileName2 = filePath.substring(filePath.lastIndexOf('/') + 1)
	  link.download = fileName2; // Ganti dengan nama file yang diinginkan
	  
	  // Tambahkan elemen <a> ke dalam dokumen
	  document.body.appendChild(link);
	
	  // Klik elemen <a> secara otomatis untuk memulai unduhan
	  link.click();
	
	  // Hapus elemen <a> dari dokumen
	  document.body.removeChild(link);
	});
}