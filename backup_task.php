<?php

include 'db_connect.php';

$tables = ["diplomski_radovi"];

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

foreach($tables as $table) {
	$result = $conn->query("SELECT * FROM $table");

	if ($result->num_rows > 0) {
		$filename = "backup_$table.txt";
        $file = fopen($filename, "w");
        while ($row = $result->fetch_assoc()) {
            $insert_query = "INSERT INTO $table (";
            $values = "VALUES (";
            foreach ($row as $key => $value) {
                $insert_query .= "$key, ";
                $values .= "'$value', ";
            }
            $insert_query = rtrim($insert_query, ", ") . ")";
            $values = rtrim($values, ", ") . ")";
            
            fwrite($file, "$insert_query\n$values;\n");
        }
        fclose($file);

        $zip = new ZipArchive();
        $zipname = "backup_$table.zip";
        if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($filename, "$table.txt");
            $zip->close();
        } else {
            echo "Error: Unable to create zip file";
        }
        unlink($filename);
	}
}
$secret_key = bin2hex(random_bytes(16));
$iv = bin2hex(random_bytes(8));

echo $secret_key;
echo "\r\n";
echo $iv;
?>