<?php
require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'init.php');
require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'Subscription.php');

$subscriptions = Subscription::all();

foreach ($subscriptions as $subscription) {
    echo $subscription->email . '<br>';
}