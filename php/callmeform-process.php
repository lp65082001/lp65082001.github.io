<?php
$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
}

if (empty($_POST["phone"])) {
    $errorMSG = "Phone is required ";
} else {
    $phone = htmlspecialchars(strip_tags(trim($_POST["phone"])));
}

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG = "Invalid email format ";
} else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
}

if (empty($_POST["select"])) {
    $errorMSG = "Select is required ";
} else {
    $select = htmlspecialchars(strip_tags(trim($_POST["select"])));
}

if (empty($_POST["terms"])) {
    $errorMSG = "Terms is required ";
} else {
    $terms = htmlspecialchars(strip_tags(trim($_POST["terms"])));
}

$EmailTo = "yourname@domain.com";
$Subject = "New quote request from portfolio website";

$Body = "";
$Body .= "Name: " . $name . "\n";
$Body .= "Phone: " . $phone . "\n";
$Body .= "Email: " . $email . "\n";
$Body .= "Package: " . $select . "\n";
$Body .= "Terms: " . $terms . "\n";

$headers = "From: noreply@lp65082001.github.io\r\n";
$headers .= "Reply-To: " . $email . "\r\n";

$success = mail($EmailTo, $Subject, $Body, $headers);

if ($success && $errorMSG == "") {
    echo "success";
} else {
    echo ($errorMSG == "") ? "Something went wrong :(" : $errorMSG;
}
?>
