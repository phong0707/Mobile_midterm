<?php
include 'function.php';

$result = array("success" => 0, "error" => 0);

if (isset($_POST['user_id'], $_POST['username'], $_POST['fullname'], $_POST['email'], $_POST['phone'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username']; // Corrected the typo 'usernam' to 'username'
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result['error'] = 4;
        $result['msg_error'] = 'Invalid email format!';
        echo json_encode($result);
        exit;
    }

    // Validate phone number format (10 digits)
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $result['error'] = 5;
        $result['msg_error'] = 'Invalid phone number format! It must be 10 digits.';
        echo json_encode($result);
        exit;
    }

    // Define the fields and values to update
    $fields = array("UserName", "FullName", "UserEmail", "PhoneNumber");
    $values = array($username, $fullname, $email, $phone);

    // Create a function object and update the database
    $func = new functions();
    $update = $func->update_data('Bmcbbu_404', $fields, $values, 'UserID', $user_id);

    if ($update) {
        $result['success'] = 1;
        $result['msg_success'] = 'Your profile has been updated successfully!';
        echo json_encode($result);
    } else {
        $result['error'] = 2;
        $result['msg_error'] = 'Profile update failed!';
        echo json_encode($result);
    }
} else {
    $result['error'] = 1;
    $result['msg_error'] = 'Missing required fields!';
    echo json_encode($result);
}
