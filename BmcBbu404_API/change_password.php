<?php

include "function.php";
$result = array("success" => 0, "error" => 0);
if (isset($_POST['userPassword']) && isset($_POST['UserID'])) {
    $id = $_POST["UserID"];
    $password = $_POST['userPassword'];
    $fields = array("UserPassword");
    $values = array($password);

    $func = new functions();
    $update = $func->update_data('Bmcbbu_404', $fields, $values, 'UserID', $id);
    if ($update == true) {
        $result["success"] = 1;
        $result["msg_success"] = "Your password has been changed";
        echo json_encode($result);
    } else {
        $result["error"] = 2;
        $result["msg_error"] = "Failed to update your password...";
        echo json_encode($result);
    }
} else {
    $result["error"] = 1;
    $result["msg_error"] = "Access Denied...";
    echo json_encode($result);
}
