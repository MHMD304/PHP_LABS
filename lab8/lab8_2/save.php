<?php
	require "Q1.php";

	if (isset($_POST['submit'])) {
		$status = $_POST['status'];
		$id = $_POST['id'];

		$userAssoc = fich2Tab("users.txt");	
		$userAssoc[$id]['status'] = $status;  // Correctly update the status
		tab2Fich($userAssoc);                  // Save the updated data back
		echo "Status updated successfully";

		
		if (!is_dir('pics')) {
			mkdir('pics', 0777, true);
		}
		 // Check if an image is uploaded
		 if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
			$upload_dir = 'pics/'; // Directory to store the uploaded image
			$ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION); // Get file extension
			$upload_file = $upload_dir . $id . '.' . $ext; 
			
		
			if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_file)) {
				echo "Profile picture updated successfully!";
			} else {
				echo "Failed to upload the profile picture.";
			}
		} else {
			echo "No image uploaded.";
		}
	}

		
?>

<html>
	<body>
		<a href="profile.php">View profile</a> 
		<a href="change.php">Change profile</a>
	</body>
</html>