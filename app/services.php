<?php
use DiDemo\FriendHarvester;
use DiDemo\Mailer\SmtpMailer;


$container['mailer'] = $container->share(function(Pimple $container){
 	$mailer = new SmtpMailer(
 		$container['database.dsn'], 
 		$container['smtp.server'], 
 		$container['smtp.user'], 
 		$container['smtp.port']
	);
 	return $mailer;
});


$container['friendHarvester'] = $container->share(function(Pimple $container){
	return  new FriendHarvester($container['pdo'],$container['mailer']);
});


$container['pdo'] = $container->share(function(Pimple $container){
	return new PDO($container['database.dsn']);
});
