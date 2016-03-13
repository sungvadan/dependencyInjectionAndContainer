<?php
require_once __DIR__.'/vendor/autoload.php';

use DiDemo\FriendHarvester;
use DiDemo\Mailer\SmtpMailer;



$container = new Pimple();

require __DIR__.'/app/config.php';
require __DIR__.'/app/services.php';
/* Start container building **/






/** End container building **/

$friendHarvester = $container['friendHarvester'];

$friendHarvester->emailFriends();
