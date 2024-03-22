<?php
include "./profile.php";

$xml = simplexml_load_file('LV2.xml');
$profiles = [];
foreach ($xml->record as $record) {
    $profile = new Profile();

    $profile->id = $record->id;
    $profile->name = $record->ime;
    $profile->surname = $record->prezime;
    $profile->email = $record->email;
    $profile->gender = $record->spol;
    $profile->image_url = $record->slika;
    $profile->bio = $record->zivotopis;
 
    $profiles[] = $profile;
}
?>
