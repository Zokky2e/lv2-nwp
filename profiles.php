<?php
include "./read_xml.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profiles</title>
	</head>
	<body>
		<div>
		<?php foreach($profiles as $profile): ?>
        <div class="profile-card" key="<?php echo $profile->id; ?>">
            <img src="<?php echo $profile->image_url; ?>" alt="Profile Image">
            <div>Name: <?php echo $profile->name; ?></div>
            <div>Surname: <?php echo $profile->surname; ?></div>
            <div>Email: <?php echo $profile->email; ?></div>
            <div>Gender: <?php echo $profile->gender; ?></div>
            <div>Bio: <?php echo $profile->bio; ?></div>
        </div>
    <?php endforeach; ?>
		</div>
	</body>
</html>