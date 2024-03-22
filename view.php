<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document Upload</title>
</head>
<body>

<h2>Upload Document</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    Select File to Upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>

<div id="fileList">
    <?php
	include 'db_connect.php';
    $target_dir = "uploads/";
    if(isset($_POST["submit"])) {
		if (!file_exists($target_dir)) {
			mkdir($target_dir, 0777, true);
		}
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if($fileType != "pdf" && $fileType != "jpeg" && $fileType != "png") {
			echo "Sorry, only PDF, JPEG, and PNG files are allowed.";
			$uploadOk = 0;
		}
		$data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
		$encrypted_data = openssl_encrypt($data, 'aes-256-cbc', $secret_key, 0, $iv);

		file_put_contents($target_file, $encrypted_data);
    }

    $files = glob($target_dir . "*");
    foreach($files as $file) {
        $filename = basename($file);
        $download_link = "download.php?file=" . urlencode($filename);
        echo "<a href='$download_link'>$filename</a><br>";
    }
    ?>
</div>
</body>
</html>
