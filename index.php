<?php
include('phpqrcode-git/lib/full/qrlib.php');
session_start(); 
// how to configure pixel "zoom" factor
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("d_m_Y_H_i_s");
$timestamp = time();
$filef = "{$tanggal}_{$timestamp}.png";
$fileName = "tmp/{$filef}";
if (array_key_exists('submit', $_POST)) {	
  $selectedText = $_POST['text'];
  $selectedECC = $_POST['ecc'];
  $selectedSize = $_POST['size'];
  QRcode::png($selectedText, $fileName, $selectedECC, $selectedSize);
  $_SESSION["file"] = $fileName;
  $_SESSION["path"] = "<img src='" . $_SESSION['file'] . "' id='imageqr' class='img-fluid shadow qrimage' alt='...'>";
  $_SESSION["btn"] = "<button type='button' id='imgdwn' class='btn btn-dark fw-bold shadow'><span class='text-warning me-2'>Download</span><span class='text-danger'>QR CODE</span></button>";
  header("Location: index.php?qrcode={$fileName}");
  exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR-Code Generator</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body>    
    <section class="container-fluid col-md-6">
    	<div class="bg-dark pt-2 fixed-top pb-1 shadow-lg">
	    	<h1 class="text-center text-light fw-bold"><span class="text-warning me-2">QR CODE</span><span class="text-danger">GENERATOR</span></h1>
        </div>
    	<div class="mb-2" style="margin-top: 5em">
    	<?php if(isset($_SESSION["path"])) { ?>
	    	<?php echo $_SESSION["path"]; ?>
		    <?php unset($_SESSION["path"]); ?>
		<?php } ?> 
        </div>
        <div class="text-center pb-2">
          <?php if(isset($_SESSION["btn"])) { ?>
	    	<?php echo $_SESSION["btn"]; ?>
		    <?php unset($_SESSION["btn"]); ?>
		  <?php } ?> 
		</div>	
    	<form method="POST" class="pt-3 pb-3 ps-3 pe-3 rounded shadow-lg" id="formqrcode">
	    	<div class="">
		        <div class="input-group has-validation">
				  <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
				  <div class="form-floating is-invalid">
				    <input name="text" type="text" class="form-control" id="floatingInputGroup2" placeholder="Data">
				    <label for="floatingInputGroup2">Masukkan Data</label>
				  </div>
				  <div class="invalid-feedback mb-2" id="data"> 
				  </div>
				</div>
			    <div class="form-floating mb-2">
				  <select name="ecc" class="form-select bg-light" id="floatingSelect" aria-label="Floating label select example">
				    <option selected>Pilih ECC</option>
				    <option value="QR_ECLEVEL_L">L-kecil</option>
				    <option value="QR_ECLEVEL_M">M</option>
				    <option value="QR_ECLEVEL_Q">Q</option>
				    <option value="QR_ECLEVEL_H">H</option>
				  </select>
				  <label for="floatingSelect">ECC</label>
				  <div class="invalid-feedback" id="ecc">     
				  </div>
				</div>
				<div class="form-floating">
				  <select name="size" class="form-select bg-light" id="floatingSelect1" aria-label="Floating label select example">
				    <option selected>PILIH Ukuran</option> 
				  </select>
				  <label for="floatingSelect">SIZE</label>
				  <div class="invalid-feedback" id="size">
				  </div>
				</div>
		    </div>
		    <div class="text-center mt-3">
		        <input class="btn fw-bold btn-dark" id="buttun" value="GENERATE" name="submit" type="submit"></input>
	        </div>
    	</form>
    </section> 
    <?php if (!empty($_GET['qrcode'])) { ?>
	    <?php $qrcode = $_GET['qrcode']; ?>
        <?php echo "<script src='loadimage.js'></script>"; ?>
		<script>
		    // Panggil fungsi triggermage() dengan parameter $qrcode dari PHP
		    triggermage('<?php echo $qrcode; ?>');
		</script>
    <?php } ?>
    <script src="code.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>



