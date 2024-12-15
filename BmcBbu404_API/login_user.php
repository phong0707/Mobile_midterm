<?php
include 'function.php';
$result = array("success" => 0, "error" => 0);
if (isset($_POST['UserLoginName']) && isset($_POST['PasswordLogin'])) {
    $username = $_POST['UserLoginName'];
    $password = $_POST['PasswordLogin'];
    // create an instance of class function
    $func = new functions();
    // call the method: login_user()
    $login = $func->login_user($username, $password);
    if ($login != false) {
        $result["success"] = 1;
        $result["msg_success"] = "Login successed...";
        $result["userID"] = $login['UserID'];
        $result["userName"] = $login['UserName'];
        $result["userPwd"] = $login['UserPassword'];
        $result["userType"] = $login['UserType'];
        $result["userimg"] = $login['UserImage'];
        $result["userEmail"] = $login['UserEmail'];
        $result["fullName"] = $login['FullName'];
        $result["phoneNumber"] = $login['PhoneNumber'];
        print json_encode($result);
    } else {
        $result["error"] = 2;
        $result["msg_error"] = "Please Login try again...!";
        print json_encode($result);
    }
} else {
    $result["error"] = 1;
    $result["msg_error"] = "Access Denied...";
    print json_encode($result);
}
