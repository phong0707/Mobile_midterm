<?php
include 'function.php'; // Ensure function.php exists with necessary methods

$result = array("success" => 0, "error" => 0);

if (isset($_FILES['image']) && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id']; // Get user ID from POST
    // Generate unique image name using current date-time to avoid file name conflicts
    $date = date('ymdhis');
    $id = $_FILES['image']['name'];
    $image_name = $date . '-' . $id . ".jpg";

    // Ensure that 'Images/' directory exists and is writable
    $upload_path = 'Images/' . $image_name;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
        // Update database with the new image name
        $field = array("UserImage");
        $value = array($image_name);
        $func = new functions();
        $update = $func->update_data('Bmcbbu_404', $field, $value, 'UserID', $user_id);

        if ($update) {
            $result['success'] = 1;
            $result['msg_success'] = 'Your profile has been updated!';
            $result['image_update'] = $image_name;
            echo json_encode($result);
        } else {
            $result['error'] = 2;
            $result['msg_error'] = 'Profile update failed!';
            echo json_encode($result);
        }
    } else {
        $result['error'] = 3;
        $result['msg_error'] = 'Failed to upload image!';
        echo json_encode($result);
    }
} else {
    $result['error'] = 1;
    $result['msg_error'] = 'No image or user ID provided';
    echo json_encode($result);
}
