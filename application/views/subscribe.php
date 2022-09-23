<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'init.php');
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'Subscription.php');

$_SESSION['flash_errors'] = [];

if (!isset($_POST['firstname']) || !preg_match('/^[a-zA-Z]+$/', $_POST['firstname'])) {
    $_SESSION['flash_errors']['firstname'] = 'firstname must be a string';
}

if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['flash_errors']['email'] = 'invalid email format';
}

if (count($_SESSION['flash_errors']) == 0) {

    $subscription = new Subscription;
    $subscription->firstname = $_POST['firstname'];
    $subscription->email = $_POST['email'];
    $subscription->create();

    echo 'subscription successful !';
} else {
    header('location:/#subscribe');
}