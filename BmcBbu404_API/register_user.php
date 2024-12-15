<?php
include 'function.php';

$result = array("success" => 0, "error" => 0);

if (!empty($_POST['FullName']) && !empty($_POST['UserName']) && !empty($_POST['Password'])) {
    $fullname = $_POST['FullName'];
    $username = $_POST['UserName'];
    $userpass = md5($_POST['Password']); // Secure password hashing

    $fields = array("UserName", "UserPassword", "FullName");
    $values = array($username, $userpass, $fullname);

    $func = new functions();
    $insert = $func->insert_data('Bmcbbu_404', $fields, $values);

    if ($insert === true) {
        $result["success"] = 1;
        $result["msg_success"] = "A user has been registered!";
    } else {
        $result["error"] = 2;
        $result["msg_error"] = "Failed to register the user. Try again later.";
    }
} else {
    $result["error"] = 1;
    $result["msg_error"] = "Invalid request. Missing required parameters.";
}

echo json_encode($result);
?>
