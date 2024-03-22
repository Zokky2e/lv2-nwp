<?php
$filename = $_GET['file'];

$encrypted_file_path = 'uploads/' . $filename;

if (file_exists($encrypted_file_path)) {
    $encrypted_data = file_get_contents($encrypted_file_path);
    $decrypted_data = openssl_decrypt($encrypted_data, 'aes-256-cbc', $secret_key, 0, $iv);
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
	
    echo $decrypted_data;
} else {
    echo "File not found.";
}
?>
