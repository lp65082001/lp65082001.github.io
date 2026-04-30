<?php
$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
}

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG = "Invalid email format ";
} else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
}

if (empty($_POST["message"])) {
    $errorMSG = "Message is required ";
} else {
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));
}

$EmailTo = "yourname@domain.com";
$Subject = "New message from portfolio website";

$Body = "";
$Body .= "Name: " . $name . "\n";
$Body .= "Email: " . $email . "\n";
$Body .= "Message: " . $message . "\n";

$headers = "From: noreply@lp65082001.github.io\r\n";
$headers .= "Reply-To: " . $email . "\r\n";

$success = mail($EmailTo, $Subject, $Body, $headers);

if ($success && $errorMSG == "") {
    echo "success";
} else {
    echo ($errorMSG == "") ? "Something went wrong :(" : $errorMSG;
}
?>
